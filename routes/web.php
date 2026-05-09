<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/age-calculator', function () {
    return view('age-calculator');
})->name('age-calculator');

