<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    use HasFactory;
    //public $timestamps = false;

    public function rol(){
        return $this->hasOne('App\Models\Rol','id','id_rol');
    }
    public function estado(){
        return $this->hasOne('App\Models\Estado','id_estado','ind_estado');
    }

}
