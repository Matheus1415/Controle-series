<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Autenticador;
use App\Mail\SeriesCreated;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'store'])->name('login.store');
Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::prefix('series')->group(function () {
    Route::get('/', [SeriesController::class, 'index'])->name('series.index');
    Route::get('/create', [SeriesController::class, 'create'])->name('series.create');
    Route::post('/store', [SeriesController::class, 'store'])->name('series.store');

    // Requer autenticação para as rotas de edição e exclusão
    Route::middleware(['autenticador'])->group(function () {
        Route::get('/edit/{series}', [SeriesController::class, 'edit'])->name('series.edit');
        Route::put('/update/{series}', [SeriesController::class, 'update'])->name('series.update');
        Route::delete('/delete/{series}', [SeriesController::class, 'destroy'])->name('series.destroy');

        Route::get('/{serieId}/season', [SeasonsController::class, 'index'])->name('seasons.index');
        Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name("episodes.index");
        Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name("seasons.episodes.update");    
    });

});



