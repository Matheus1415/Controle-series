<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadaController;

Route::get('/', [SeriesController::class, 'index'])->name('series.index');

Route::prefix('series')->group(function(){
    Route::get('/criar', [SeriesController::class, 'create'])->name('series.create');
    Route::post('/salvar', [SeriesController::class, 'store'])->name('series.store');
    Route::get('/edit/{series}',[SeriesController::class, 'edit'])->name('series.edit');
    Route::put('/update/{series}',[SeriesController::class, 'update'])->name('series.update');
    Route::delete('/series/{series}', [SeriesController::class, 'destroy'])->name('series.destroy');

    Route::get('/{serie}/temporada',[TemporadaController::class, 'index'])->name('temporada.index');
});
