<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Middleware\Autenticador;

Route::get('/',[LoginController::class, 'index'])->name('login');

Route::middleware([Autenticador::class])->group(function () {
    Route::prefix('series')->group(function(){
        Route::get('/', [SeriesController::class, 'index'])->name('series.index');
        Route::get('/criar', [SeriesController::class, 'create'])->name('series.create');
        Route::post('/salvar', [SeriesController::class, 'store'])->name('series.store');
        Route::get('/edit/{series}',[SeriesController::class, 'edit'])->name('series.edit');
        Route::put('/update/{series}',[SeriesController::class, 'update'])->name('series.update');
        Route::delete('/series/{series}', [SeriesController::class, 'destroy'])->name('series.destroy');

        Route::get('/{serie}/temporada',[SeasonsController::class, 'index'])->name('seasons.index');
        Route::get('/temporadas/{season}/episodes',[EpisodesController::class,'index'])->name("episodes.index");
        Route::put('/temporadas/{season}/episodes',[EpisodesController::class, 'update'])->name("seasons.episodes.update");
    });
});
