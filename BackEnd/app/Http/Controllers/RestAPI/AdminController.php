<?php

namespace App\Http\Controllers\RestAPI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

use JWTAuth,JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator, DB, Hash, Mail,Response;
use Illuminate\Support\Facades\Password;

class AdminController extends Controller
{
    //




    



    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $credentials = $request->only(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Invalid creentials'], 400);
        }
        $current_user = $request->email;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'current_user' => $current_user,
            'expires_in' => auth()->factory()->getTTL() * 60
        ], 200);
    }



    public function logout(Request $request){
        auth()->logout(true); // Force token to blacklist
        return response()->json(['success' => 'Logged out
        Successfully.'], 200); 
    }
        


    
}
