<?php

namespace App\Http\Controllers;

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
        ];

        return response()->view('sitemap', compact('urls'))
            ->header('Content-Type', 'text/xml');
    }
}
