<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function author(){
        // $data = new Author();
        // $authors = $data ->getAuthors();
        
        // $authors = Author::all();
        // return view('authors', ['authors' => $authors]);

        $authors = Author::all();
        return response()->json([
            "success" => true,
            "massage" => "Get All Resource",
            "data" => $authors
        ], 200);
    }
}
