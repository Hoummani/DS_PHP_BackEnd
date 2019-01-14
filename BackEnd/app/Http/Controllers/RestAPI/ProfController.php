<?php

namespace App\Http\Controllers\RestAPI;
use Validator, DB, Hash, Mail,Response;


use Illuminate\Http\Request;
use App\Prof;
use App\Http\Controllers\Controller;

class ProfController extends Controller
{
    //

    public function __construct(){
        
    }

    

    public function sendResponse($result,$message,$statusResult){

        $response=[
            'status'=>$statusResult,
            'data'=>$result,
            'message'=>$message
        ];

        return response()->json($response);

    }

    public function index(){
        $profs=Prof::all();

        $result=$profs->toArray();
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
            'status'=>'required',
            'password'=>'required'
        ]);
        if ($validator->fails()) {
            # code...
            $result=$validator->errors();
            $message="Validaion match error  :( !";
            $statusResult=false;
            return $this->sendResponse($result,$message,$statusResult);
        }
        $prof=Prof::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'status' => $request->status,
            'password' => bcrypt($request->password),
        ]);
        $result=$prof->toArray();
        $message="Prof created with happy moments hhhhh !";
        $statusResult=true;
        return $this->sendResponse($result,$message,$statusResult);
    }




    




}
