<?php

namespace App\Http\Controllers;

use App\Models\Post;

class SitemapController extends Controller
{
    public function index()
    {
        $lastmod = fn ($view) => date(DATE_ATOM, filemtime(resource_path("views/{$view}.blade.php")));

        $urls = [
            [
                'loc' => url('/'),
                'lastmod' => $lastmod('home'),
                'changefreq' => 'weekly',
                'priority' => '1.0',
            ],
            [
                'loc' => route('age-calculator'),
                'lastmod' => $lastmod('age-calculator'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('time-duration-calculator'),
                'lastmod' => $lastmod('time-duration-calculator'),
                'changefreq' => 'monthly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('age-calculator.export-studio'),
                'lastmod' => $lastmod('export-studio'),
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ],
            [
                'loc' => route('about'),
                'lastmod' => $lastmod('pages/about'),
                'changefreq' => 'monthly',
                'priority' => '0.5',
            ],
            [
                'loc' => route('privacy'),
                'lastmod' => $lastmod('pages/privacy'),
                'changefreq' => 'monthly',
                'priority' => '0.3',
            ],
            [
                'loc' => route('terms'),
                'lastmod' => $lastmod('pages/terms'),
                'changefreq' => 'monthly',
                'priority' => '0.3',
            ],
            [
                'loc' => route('contact'),
                'lastmod' => $lastmod('pages/contact'),
                'changefreq' => 'monthly',
                'priority' => '0.5',
            ],
            [
                'loc' => route('blog.index'),
                'lastmod' => date(DATE_ATOM),
                'changefreq' => 'daily',
                'priority' => '0.8',
            ],
        ];

        $posts = Post::where('is_published', true)->get();
        foreach ($posts as $post) {
            $urls[] = [
                'loc' => route('blog.show', $post->slug),
                'lastmod' => $post->updated_at->toIso8601String(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ];
        }

        return response()->view('sitemap', compact('urls'))
            ->header('Content-Type', 'text/xml');
    }
}
