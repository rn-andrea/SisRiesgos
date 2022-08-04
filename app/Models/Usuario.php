<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    use HasFactory;
    //public $timestamps = false;

    public function rol(){
        return $this->hasOne('App\Models\Rol','ID','ID_ROL');
    }
    public function estado(){
        return $this->hasOne('App\Models\Estado','ID_ESTADO','IND_ESTADO');
    }

}
