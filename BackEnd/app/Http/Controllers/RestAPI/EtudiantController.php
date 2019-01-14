<?php

namespace App\Http\Controllers\RestAPI;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Etudiant;
use App\Filiere;
use Validator, DB, Hash, Mail,Response;

class EtudiantController extends Controller
{
    //



    public function __construct(){

        if(!$this->middleware('auth:scolarite')){
            $staus=false;
            $message="You are not authorized !";
            $data=[];
            $this->sendResponse($data,$message,$staus);
        }
        
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
        $etudiants=Etudiant::all();
        $filieres=Filiere::all();
        $result=[$etudiants->toArray(),$filieres->toArray()];
        $message="Read successfuly !";
        $statusResult=true;
        return $this->sendResponse($result,$message,$statusResult);
    }

    public function store(Request $request){
        $inputs=$request->all();
        $validator=Validator::make($inputs,[
            'nom'=>'required',
            'prenom'=>'required',
            'cne'=>'required',
            'abscence'=>'required',
            'filiere_id'=>'required',
            'filiere_name'=>'required'
        ]);
        if ($validator->fails()) {
            # code...
            $result=$validator->errors();
            $message="Validaion match error  :( !";
            $statusResult=false;
            return $this->sendResponse($result,$message,$statusResult);
        }
        $etudiant=Etudiant::create($inputs,[
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'cne'=>$request->cne,
            'abscence'=>$request->abscence,
            'filiere_id'=>$request->filiere_id,
        ]);
        $filiere=Filiere::create($inputs,[
            'nom'=>$request->filiere_name
        ]);
        $result=[$etudiant->toArray(),$filiere->toArray()];
        $message="Etudiant created successfly!";
        $statusResult=true;
        return $this->sendResponse($result,$message,$statusResult);
    }

    public function show($id){

        $etudiant=Etudiant::find($id);

        if (is_null($etudiant)) {
            # code...
            $result=[];
            $message="Etudiant not found !";
            $statusResult=false;
            return $this->sendResponse($result,$message,$statusResult);
        }
        $result=$etudiant->toArray();
        $message="Etudiant is here !";
        $statusResult=true;
        return $this->sendResponse($result,$message,$statusResult);

    }



    public function update(Request $request,Etudiant $etudiant){
        $inputs=$request->all();
        $validator=Validator::make($inputs,[
            'nom'=>'required',
            'prenom'=>'required',
            'cne'=>'required',
            'abscence'=>'required',
            'filiere_id'=>'required'
        ]);
        if ($validator->fails()) {
            # code...
            $result=$validator->errors();
            $message="Validaion match error  :( !";
            $statusResult=false;
            return $this->sendResponse($result,$message,$statusResult);
        }
        $etudiant->nom=$inputs['nom'];
        $etudiant->prenom=$inputs['prenom'];
        $etudiant->cne=$inputs['cne'];
        $etudiant->abscence=$inputs['abscence'];
        $etudiant->filiere_id=$inputs['filiere_id'];
        $etudiant->save();
        $result=$etudiant->toArray();
        $message="Etudiant updated with happy moments hhhhh !";
        $statusResult=true;
        return $this->sendResponse($result,$message,$statusResult);
    }

    public function destroy(Etudiant $etudiant){
        $etudiant->delete();
        $result=$etudiant->toArray();
        $message="Etudiant deleted with sorry for going ): !";
        $statusResult=true;
        return $this->sendResponse($result,$message,$statusResult);
    }


}
