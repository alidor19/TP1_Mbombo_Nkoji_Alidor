<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CriticController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/films', [FilmController::class, 'index']);
Route::get('/films/search', [FilmController::class, 'search']);
Route::get('/films/{id}/actors', [FilmController::class, 'actors']);
Route::get('/films/{id}', [FilmController::class, 'show']);

Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);

Route::delete('/critics/{id}', [CriticController::class, 'destroy']);