<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use JWTAuth,JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator, DB, Hash, Mail,Response;
use Illuminate\Support\Facades\Password;



class RegisterController extends Controller
{
    //

    public function adminRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $token = auth()->login($user);
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ], 201);
    }

}
