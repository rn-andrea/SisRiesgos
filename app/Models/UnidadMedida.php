<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;
    public function usuario(){
        return $this->hasOne('App\Models\Usuario','ID_USUARIO','USR_CREACION');
    }
    public function usuario1(){
        return $this->hasOne('App\Models\Usuario','ID_USUARIO','USR_MODIFICA');
    }
    public function estado(){
        return $this->hasOne('App\Models\Estado','ID_ESTADO','IND_ESTADO');
    }
}
