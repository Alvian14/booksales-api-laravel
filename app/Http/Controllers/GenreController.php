<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function index(){
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

    // source code mengambil data berdasarkan id
    public function show(string $id) {
        $genre = Genre::find($id);

         // respone untuk data tidak ditemukan
        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "resource not found"
            ], 404);
        }

        // response data ditemukan
        return response()->json([
            "success" => true,
            "mesagge" => "Get detail resource",
            "data" => $genre
        ], 200);
    }

    public function update(string $id, Request $request) {
        $genre = Genre::find($id);
         if (!$genre) {
            return response()->json([
                 "success" => false,
                "message" => "Resource not found",
            ], 404);
        }

        // validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

         // data diupdate
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // update data baru ke database
        $genre->update($data);

        return response()->json([
            "success" => true,
            "message" => "Resource updated successfully!.",
            "data" => $genre
        ],200);
    }

    //digunakan untuk menghapus data
    public function destroy(string $id) {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found.",
                "data" => $genre
            ]);
        }

        $genre->delete();
        return response()->json([
            "success" => true,
            "message" => "Delete resource successfully!.",
        ],200);
    }
}
