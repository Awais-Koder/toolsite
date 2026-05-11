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
                'lastmod' => $lastmod('about-us'),
                'changefreq' => 'monthly',
                'priority' => '0.5',
            ],
            [
                'loc' => route('privacy'),
                'lastmod' => $lastmod('privacy-policy'),
                'changefreq' => 'monthly',
                'priority' => '0.3',
            ],
            [
                'loc' => route('terms'),
                'lastmod' => $lastmod('terms-of-service'),
                'changefreq' => 'monthly',
                'priority' => '0.3',
            ],
            [
                'loc' => route('contact'),
                'lastmod' => $lastmod('contact-us'),
                'changefreq' => 'monthly',
                'priority' => '0.5',
            ],
        ];

        return response()->view('sitemap', compact('urls'))
            ->header('Content-Type', 'text/xml');
    }
}
