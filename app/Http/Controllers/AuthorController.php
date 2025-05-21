<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function author(){
        // $data = new Author();
        // $authors = $data ->getAuthors();
        
        // $authors = Author::all();
        // return view('authors', ['authors' => $authors]);

        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                "success" => true,
                "massage" => "Resource data not found!",
                "data" => null
            ], 200);
        }

        return response()->json([
            "success" => true,
            "massage" => "Get All Resource",
            "data" => $authors
        ], 200);
    }

    //digunakan untuk menambahkan data
    public function store(Request $request){
        //validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'bio' => 'required|string'
        ]);

        //check validator eror
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        //upload image
        $image = $request->file('photo');
        $image->store('author', 'public');

        //insert data
        $author = Author::create([
            'name' => $request->name,
            'photo' => $image->hashName(),
            'bio' => $request->bio
        ]);

        //response
        return response()->json([
            'success' => true,
            'message' => 'Resource added successfully!',
            'data' => $author
        ], 201);
        
    }
}
