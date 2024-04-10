<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/series', [SeriesController::class, 'index'])->name('series.index');
Route::get('/series/criar', [SeriesController::class, 'create'])->name('series.create');
Route::post('/series/salvar', [SeriesController::class, 'store'])->name('series.store');
