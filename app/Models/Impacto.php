<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impacto extends Model
{
    use HasFactory;

    public function usuario(){
        return $this->hasOne('App\Models\Usuario','id_usuario','usr_creacion');
    }
    public function usuario1(){
        return $this->hasOne('App\Models\Usuario','id_usuario','usr_modifica');
    }
    public function estado(){
        return $this->hasOne('App\Models\Estado','id_estado','ind_estado');
    }
}
