<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//routing books
Route:: get ('/books', [BookController::class, 'book']);

//routing genres
Route:: get ('/genres', [GenreController::class, 'genre']);

//routing authors
Route:: get ('/authors', [AuthorController::class, 'author']);