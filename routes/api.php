<?php

use App\Http\Controllers\Api\ApiController;
use App\Models\Episode;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/series',ApiController::class);
Route::get('/series/{serie}/seasons',function(Series $serie){
    return $serie->seasons;
});
Route::get('/series/{serie}/episodes',function(Series $serie){
    return $serie->episodes;
});
Route::patch('/episodes/{episodes}',function(Episode $episodes, Request $request){
    $episodes->watched = $request->watched;
    $episodes->save();
    return $episodes;
});