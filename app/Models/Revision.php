<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;

    
    public function estado(){
        return $this->hasOne('App\Models\Estado','id_estado','ind_estado');
    }
}
