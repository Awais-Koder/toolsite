<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/age-calculator', function () {
    return view('age-calculator');
})->name('age-calculator');

Route::get('/age-calculator/export-studio', function () {
    return view('export-studio');
})->name('age-calculator.export-studio');

Route::get('/time-duration-calculator', function () {
    return view('time-duration-calculator');
})->name('time-duration-calculator');

Route::get('/privacy-policy', function () {
    return view('pages.privacy');
})->name('privacy');

Route::get('/terms-of-service', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/about-us', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact-us', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

Route::get('/api/history/{month}/{day}', function ($month, $day) {
    try {
        $event = DB::table('historical_events')
            ->where('month', $month)
            ->where('day', $day)
            ->inRandomOrder()
            ->first();

        if ($event) {
            $yearText = $event->year ? "in {$event->year}, " : '';

            return [
                'text' => "On this day in history, {$yearText}".$event->event,
                'year' => $event->year,
                'title' => $event->title,
            ];
        }

        return ['text' => 'History is full of surprises! Stay curious.'];
    } catch (Exception $e) {
        return ['text' => 'On this day, something remarkable happened in history!'];
    }
});

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});
