<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TransactionController;
use Database\Seeders\BookSeeder;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//route register & login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

//route public access (no login)
Route::apiResource('/books', BookController::class)->only(['index', 'show']);
Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/{id}',  [GenreController::class, 'show']);
Route::get('/authors',  [AuthorController::class, 'index']);
Route::get('/authors/{id}',  [AuthorController::class, 'show']);


// route user authentication (customer)
Route::middleware(['auth:api'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::get('/transactions/{id}', [TransactionController::class, 'show']);
});

// route admin only
Route::middleware(['auth:api', 'admin'])->group(function () {
    // admin akses semua transaksi (lihat semua, edit, hapus)
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::put('/transactions/{id}', [TransactionController::class, 'update']);
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);

    //admin CRUD buku
    Route::post('/books', BookController::class, 'store');
    Route::put('/books/{id}', BookController::class, 'update');
    Route::delete('/books/{id}', BookController::class, 'destroy');

    //admin CRUD genre
    Route::post('/genres', GenreController::class, 'store');
    Route::put('/genres/{id}', GenreController::class, 'update');
    Route::delete('/genres/{id}', GenreController::class, 'destroy');

    //admin CRUD author
    Route::post('/authors', AuthorController::class, 'store');
    Route::put('/authors/{id}', AuthorController::class, 'update');
    Route::delete('/authors/{id}', AuthorController::class, 'destroy');
});


