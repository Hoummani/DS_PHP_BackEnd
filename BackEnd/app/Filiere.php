<?php

namespace App;

use App\Prof;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    //

    protected $fillable = [
        'nom'
    ];

    public function etudiants(){
        return $this->hasMany('App\Etudiant','filiere_id');
    }

    public function profs(){
            
            return $this->belongsToMany('App\Prof', 'prof_filiere', 'prof_id', 'filiere_id');
    }
}
