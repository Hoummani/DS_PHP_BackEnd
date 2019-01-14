<?php

namespace App\Http\Controllers\RestAPI;
use Validator, DB, Hash, Mail,Response;
use App\Scolarite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScolariteController extends Controller
{
    
    public function sendResponse($result,$message,$statusResult){

        $response=[
            'status'=>$statusResult,
            'data'=>$result,
            'message'=>$message
        ];

        return response()->json($response);

    }

    public function index(){
        $scolarites=Scolarite::all();

        $result=$scolarites->toArray();
        $message="Read successfuly !";
        $statusResult=true;
        return $this->sendResponse($result,$message,$statusResult);
    }


    public function store(Request $request){
        $inputs=$request->all();
        $validator=Validator::make($inputs,[
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if ($validator->fails()) {
            # code...
            $result=$validator->errors();
            $message="Validaion match error  :( !";
            $statusResult=false;
            return $this->sendResponse($result,$message,$statusResult);
        }
        $scolarite=Scolarite::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            
            'password' => bcrypt($request->password),
        ]);
        $result=$scolarite->toArray();
        $message="Prof created with happy moments hhhhh !";
        $statusResult=true;
        return $this->sendResponse($result,$message,$statusResult);
    }

}
