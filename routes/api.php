<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//routing books
Route::get('/books', [BookController::class, 'book']);
Route::post('/books', [BookController::class, 'store']);

//routing genres
Route:: get ('/genres', [GenreController::class, 'genre']);
Route:: post ('/genres', [GenreController::class, 'store']);

//routing authors
Route:: get ('/authors', [AuthorController::class, 'author']);
Route:: post ('/authors', [AuthorController::class, 'store']);