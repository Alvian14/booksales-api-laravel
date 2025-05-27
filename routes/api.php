<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TransactionController;
use Database\Seeders\BookSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//route register & login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

//route books
Route::apiResource('/books', BookController::class)->only(['index',]);
//route genres
Route::apiResource('/genres', GenreController::class)->only(['index']);
//route authors
Route::apiResource('/authors', AuthorController::class)->only(['index']);

// route untuk customer
Route::middleware(['auth:api'])->group(function(){
   Route::apiResource('/transactions', TransactionController::class)->only(['store', 'show', 'update']);
   Route::apiResource('/authors', AuthorController::class)->only(['store', 'show', 'update']);
   Route::apiResource('/genres', GenreController::class)->only(['store', 'show', 'update']);
   Route::apiResource('/books', BookController::class)->only(['store', 'show', 'update']);


    //route untuk admin
    Route::middleware(['role:admin'])->group(function () {
        Route::apiResource('/books', BookController::class)->only(['index','destroy']);
        Route::apiResource('/genres', GenreController::class)->only(['index','destroy']);
        Route::apiResource('/authors', AuthorController::class)->only(['index','destroy']);
        Route::apiResource('/transactions', TransactionController::class)->only([ 'index', 'destroy']);
    }); 
});




