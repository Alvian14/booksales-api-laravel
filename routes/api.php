<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Database\Seeders\BookSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//route books
Route::apiResource('/books', BookController::class);

//route genres
Route::apiResource('/genres', GenreController::class);

//route authors
Route::apiResource('/authors', AuthorController::class);
