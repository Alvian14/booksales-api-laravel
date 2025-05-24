<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request) {
        //validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8'
        ]);

        //check validator
        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }
 
        //create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //check behasil
        if ($user) {
            return response()->json([
                'success' => true,
                'message' =>  'User created succesfully.',
                'data' => $user
            ],201);
        }

        //check gagal
        return response()->json([
            'success' => false,
            'message' =>  'User creation faild',
        ],409);
    }


    public function login(Request $request){
        //validator
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //cek validator
        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        //get kredensial dari request
        $credentials = $request->only('email','password');

        //cek gagal
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Your email or password is incorrect!'
            ],401);
        }

        //cek berhasil
        return response()->json([
            'success' => true,
            'message' => 'Login Succesfully',
            'user' => auth()->guard('api')->user(),
            'token' => $token
        ],200);
    }


    public function logout(Request $request) {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                'success' => true,
                'message' => 'Logout successfully'
            ],200);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Logout failed!'
            ],500);
        }
    }
}
