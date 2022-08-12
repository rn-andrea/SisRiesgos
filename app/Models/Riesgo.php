<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riesgo extends Model
{
    use HasFactory;
    
    public function rol(){
        return $this->hasOne('App\Models\Rol','id','id_rol');
    }
    public function estado(){
        return $this->hasOne('App\Models\Estado','id_estado','ind_estado');
    }
    public function usuario(){
        return $this->hasOne('App\Models\Usuario','id_usuario','usr_creacion');
    }
    public function usuario1(){
        return $this->hasOne('App\Models\Usuario','id_usuario','usr_modifica');
    }
    public function categoria(){
        return $this->hasOne('App\Models\CategoriaRiesgo','id','id_categoria');
    }
    public function procesoafecta(){
        return $this->hasOne('App\Models\ProcesoAfecta','id','id_proceso_afecta');
    }
    public function probabilidad(){
        return $this->hasOne('App\Models\Probabilidad','id','id_probabilidad');
    }
    public function impacto(){
        return $this->hasOne('App\Models\Impacto','id','id_impacto');
    }
    public function accion(){
        return $this->hasOne('App\Models\Accion','id','id_accion');
    }
    public function unidadmedida(){
        return $this->hasOne('App\Models\UnidadMedida','id','id_unidad_medida');
    }
}
