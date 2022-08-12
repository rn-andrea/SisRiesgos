<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsableProcesoAfecta extends Model
{
    use HasFactory;
    public function usuario(){
        return $this->hasOne('App\Models\Usuario','id_usuario','usr_responsable_proceso');
    }
    public function procesoafecta(){
        return $this->hasOne('App\Models\ProcesoAfecta','id','id_proceso_afecta');
    }
    public function estado(){
        return $this->hasOne('App\Models\Estado','id_estado','ind_estado');
    }
}
