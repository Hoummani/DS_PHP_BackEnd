<?php

namespace App;

use App\Filiere;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    //


    protected $fillable = [
        'nom', 'prenom', 'cne','abscence','filiere_id'
    ];


    public function filiere(){
        return $this->belongsTo('App\Filiere');
    }
}
