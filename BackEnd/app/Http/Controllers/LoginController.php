<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Prof;

use JWTAuth,JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator, DB, Hash, Mail,Response;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
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



    public function adminLogin(Request $request){
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



    public function adminLogout(Request $request){
        auth()->logout(true); // Force token to blacklist
        return response()->json(['success' => 'Logged out
        Successfully.'], 200); 
    }

    //Espace Prof

   
    public function profRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'nom' => 'required',
            'prenom' => 'required',
            'status' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user = Prof::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'status' => $request->status,
            'password' => bcrypt($request->password),
        ]);
        $token = auth()->guard('prof')->login($user);
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('prof')->factory()->getTTL() * 60
        ], 201);
    }



    public function profLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $credentials = $request->only(['email', 'password']);
        if (!$token = auth()->guard('prof')->attempt($credentials)) {
            return response()->json(['error' => 'Invalid creentials'], 400);
        }
        $current_user = $request->email;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'current_user' => $current_user,
            'expires_in' => auth()->guard('prof')->factory()->getTTL() * 60
        ], 200);
    }



    public function profLogout(Request $request){
        auth()->guard('prof')->logout(true); // Force token to blacklist
        return response()->json(['success' => 'Logged out
        Successfully.'], 200); 
    }


    //espace scolarite
    public function scolariteLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $credentials = $request->only(['email', 'password']);
        if (!$token = auth()->guard('scolarite')->attempt($credentials)) {
            return response()->json(['error' => 'Invalid creentials'], 400);
        }
        $current_user = $request->email;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'current_user' => $current_user,
            'expires_in' => auth()->guard('scolarite')->factory()->getTTL() * 60
        ], 200);
    }



    public function scolariteLogout(Request $request){
        auth()->guard('scolarite')->logout(true); // Force token to blacklist
        return response()->json(['success' => 'Logged out
        Successfully.'], 200); 
    }

}
