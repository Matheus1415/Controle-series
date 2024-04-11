<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Models\Series;


    Route::prefix('series')->group(function(){
        Route::get('/', [SeriesController::class, 'index'])->name('series.index');
        Route::get('/criar', [SeriesController::class, 'create'])->name('series.create');
        Route::post('/salvar', [SeriesController::class, 'store'])->name('series.store');
        Route::delete('/deletar/{id}',[SeriesController::class, 'destroy'])->name('series.delete');
        Route::put('/edit/{id}',[SeriesController::class, 'edit'])->name('serie.edit');
    });
