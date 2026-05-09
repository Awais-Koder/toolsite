<?php

namespace App\Console\Commands;

use App\Models\HistoricalEvent;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

#[Signature('heal:events')]
#[Description('Command description')]
class HealHistoricalEvents extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $missing = [];

        // STEP 1: Find missing dates
        for ($m = 1; $m <= 12; $m++) {
            for ($d = 1; $d <= 31; $d++) {

                if (! checkdate($m, $d, 2024)) {
                    continue;
                }

                $exists = HistoricalEvent::where('month', $m)
                    ->where('day', $d)
                    ->exists();

                if (! $exists) {
                    $missing[] = [$m, $d];
                }
            }
        }

        $this->info('Missing dates found: '.count($missing));

        // STEP 2: Fetch + Save missing data
        foreach ($missing as [$month, $day]) {

            $this->info("Fixing {$month}/{$day}");

            $url = "https://en.wikipedia.org/api/rest_v1/feed/onthisday/events/{$month}/{$day}";

            try {

                $response = Http::withHeaders([
                    'User-Agent' => 'BirthdayTool/1.0',
                ])
                    ->retry(5, 2000)
                    ->timeout(30)
                    ->get($url);

                if (! $response->successful()) {
                    $this->warn("Failed again: {$month}/{$day}");

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

                usleep(300000);

            } catch (\Throwable $e) {

                $this->error("Error {$month}/{$day}: ".$e->getMessage());

                \Log::error('Heal command failed', [
                    'month' => $month,
                    'day' => $day,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        $this->info('Done healing historical dataset.');

        return 0;
    }
}
