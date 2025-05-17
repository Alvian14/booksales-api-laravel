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
Route:: get ('/books', [BookController::class, 'book']);

//routing genres
Route:: get ('/genres', [GenreController::class, 'genre']);

//routing authors
Route:: get ('/authors', [AuthorController::class, 'author']);