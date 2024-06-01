<?php

use App\Http\Controllers\Api\ApiController;
use App\Models\Episode;
use App\Models\Series;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

Route::post('/login', function(Request $request){
    $credencial = $request->only('email', 'password');
    $user = User::whereEmail($credencial['email'])->first();
    if($user == null || !Hash::check($credencial['password'], $user->password)){
        return response()->json([
           'message' => 'Credenciais inválidas'
        ], 401);
    }
    return $user;
});