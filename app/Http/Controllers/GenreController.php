<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function genre(){
        // $data = new Genre();
        // $genres = $data ->getGenres();
        
        // $genres = Genre::all();
        // return view('genres', ['genres' => $genres]);

        $genres = Genre::all();

        if ($genres->isEmpty()) {
            return response()->json([
                "success" => true,
                "massage" => "Resource data not found!",
                "data" => null
            ], 200);
        }

        return response()->json([
            "success" => true,
            "massage" => "Get All Resource",
            "data" => $genres
        ], 200);
    }

    // source code create
    public function store(Request $request){
        //validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'description' => 'required|string'
        ]);

        // check validator eror
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // insert data
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        // response
        return response()->json([
            "success" => true,
            "massage" => "Resource added successfully!",
            "data" => $genre
        ], 201);
            
    }
}
