<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/email', function () {
    return new \App\Mail\SeriesCreated(
        'Série de teste',
        19,
        5,
        10,
    );
});

require __DIR__ . '/auth.php';
