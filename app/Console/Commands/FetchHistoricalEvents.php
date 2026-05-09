<?php

namespace App\Console\Commands;

use App\Models\HistoricalEvent;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

#[Signature('fetch:events')]
#[Description('Command description')]
class FetchHistoricalEvents extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        for ($month = 1; $month <= 12; $month++) {

            for ($day = 1; $day <= 31; $day++) {

                if (! checkdate($month, $day, 2024)) {
                    continue;
                }

                $this->info("Fetching {$month}/{$day}");

                $url = "https://en.wikipedia.org/api/rest_v1/feed/onthisday/events/{$month}/{$day}";

                try {

                    // 🔁 Retry + backoff
                    $response = Http::withHeaders([
                        'User-Agent' => 'BirthdayTool/1.0',
                    ])
                        ->retry(3, 2000) // 3 attempts, 2s delay
                        ->timeout(20)
                        ->get($url);

                    // ❌ If still failed
                    if (! $response->successful()) {

                        $this->error("Failed {$month}/{$day}");

                        \Log::error('Wikipedia fetch failed', [
                            'month' => $month,
                            'day' => $day,
                            'status' => $response->status() ?? null,
                            'url' => $url,
                        ]);

                        continue;
                    }

                    $events = $response->json('events') ?? [];

                    foreach ($events as $event) {

                        HistoricalEvent::firstOrCreate(

                            [
                                'month' => $month,
                                'day' => $day,
                                'year' => $event['year'] ?? null,
                                'event' => $event['text'] ?? '',
                            ],

                            [
                                'title' => $event['pages'][0]['title'] ?? null,

                                'wikipedia_url' => $event['pages'][0]['content_urls']['desktop']['page']
                                    ?? null,
                            ]
                        );
                    }

                    // 🧠 polite delay (avoid rate limit)
                    usleep(300000); // 0.3 sec

                } catch (\Throwable $e) {

                    $this->error("Exception {$month}/{$day}: ".$e->getMessage());

                    \Log::error('Wikipedia exception', [
                        'month' => $month,
                        'day' => $day,
                        'error' => $e->getMessage(),
                    ]);

                    // continue next date (don’t stop whole job)
                    continue;
                }
            }
        }

        $this->info('Done.');
    }
}
