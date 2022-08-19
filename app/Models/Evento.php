<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
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
    public function riesgo(){
        return $this->hasOne('App\Models\Riesgo','id_riesgos','id_riesgos');
    }
    public function estadoresolucion(){
        return $this->hasOne('App\Models\EstadoResolucion','id','id_estado_resolucion');
    }
    public function accions(){
        return $this->hasOne('App\Models\Accion','id','id_accion');
    }
    public function unidadmedida(){
        return $this->hasOne('App\Models\UnidadMedida','id','id_unidad_medida');
    }
    public function probabilidad(){
        return $this->hasOne('App\Models\Probabilidad','id','id_probabilidad');
    }
    
   
  
}
