<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function author(){
        // $data = new Author();
        // $authors = $data ->getAuthors();
        
        $authors = Author::all();
        return view('authors', ['authors' => $authors]);
    }
}
