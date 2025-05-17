<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function book(){
        // $data = new Book();
        // $books = $data->getBooks();
        
        // digunakan untuk menampilkan di view
        // $books = Book::all();
        // return view('books', ['books' => $books]);

        // digunakan untuk response di JSON
        $books = Book::all();
        return response()->json([
            "success" => true,
            "massage" => "Get All Resource",
            "data" => $books
        ], 200);
    }
}
