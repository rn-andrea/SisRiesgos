<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteRiesgosController extends Controller
{

    public function inicio(Request $request)
    {
       if($request->get('orden')=='1')
        //tomar en cuenta que cuando se levanta la página, la orden va ser 1 ---------------------------
        {
            $reporteRiesgos = DB::select('SELECT riesgos.id, riesgos.nom_riesgos, categoria_riesgos.nom_categoria, riesgos.des_detalle, proceso_afectas.id_nomenclatura, probabilidads.nom_probabilidad, impactos.nom_impacto, riesgos.tot_calificacion, riesgos.num_pos_matriz, accions.nom_accion, riesgos.ind_afecta_servicio, riesgos.num_rto, riesgos.id_unidad_medida, riesgos.tot_tolerancia, riesgos.tot_capacidad, riesgos.usr_creacion, riesgos.usr_modifica, riesgos.ind_estado, riesgos.nom_archivo, riesgos.created_at, unidad_medidas.nom_unidad_medida FROM `riesgos`, `categoria_riesgos`, `proceso_afectas`, `probabilidads`, `impactos`, `accions`, `unidad_medidas` WHERE unidad_medidas.id = riesgos.id_unidad_medida and riesgos.id_categoria = categoria_riesgos.id and riesgos.id_proceso_afecta = proceso_afectas.id and riesgos.id_probabilidad = probabilidads.id and riesgos.id_impacto = impactos.id and riesgos.id_accion = accions.id;');
        return view ('vwReporteRiesgos', [
            'reporteRiesgos' => $reporteRiesgos
        ]);
        }else if($request->get('orden')=='2')
        {
            $reporteRiesgos = DB::select('SELECT riesgos.id, riesgos.nom_riesgos, categoria_riesgos.nom_categoria, riesgos.des_detalle, proceso_afectas.id_nomenclatura, probabilidads.nom_probabilidad, impactos.nom_impacto, riesgos.tot_calificacion, riesgos.num_pos_matriz, accions.nom_accion, riesgos.ind_afecta_servicio, riesgos.num_rto, riesgos.id_unidad_medida, riesgos.tot_tolerancia, riesgos.tot_capacidad, riesgos.usr_creacion, riesgos.usr_modifica, riesgos.ind_estado, riesgos.nom_archivo, riesgos.created_at, unidad_medidas.nom_unidad_medida FROM `riesgos`, `categoria_riesgos`, `proceso_afectas`, `probabilidads`, `impactos`, `accions`, `unidad_medidas` WHERE unidad_medidas.id = riesgos.id_unidad_medida and riesgos.id_categoria = categoria_riesgos.id and riesgos.id_proceso_afecta = proceso_afectas.id and riesgos.id_probabilidad = probabilidads.id and riesgos.id_impacto = impactos.id and riesgos.id_accion = accions.id order by proceso_afectas.id_nomenclatura ASC;');
            return view ('vwReporteRiesgos', [
                'reporteRiesgos' => $reporteRiesgos
            ]);
        }
        else
        {
            $reporteRiesgos = DB::select('SELECT riesgos.id, riesgos.nom_riesgos, categoria_riesgos.nom_categoria, riesgos.des_detalle, proceso_afectas.id_nomenclatura, probabilidads.nom_probabilidad, impactos.nom_impacto, riesgos.tot_calificacion, riesgos.num_pos_matriz, accions.nom_accion, riesgos.ind_afecta_servicio, riesgos.num_rto, riesgos.id_unidad_medida, riesgos.tot_tolerancia, riesgos.tot_capacidad, riesgos.usr_creacion, riesgos.usr_modifica, riesgos.ind_estado, riesgos.nom_archivo, riesgos.created_at, unidad_medidas.nom_unidad_medida FROM `riesgos`, `categoria_riesgos`, `proceso_afectas`, `probabilidads`, `impactos`, `accions`, `unidad_medidas` WHERE unidad_medidas.id = riesgos.id_unidad_medida and riesgos.id_categoria = categoria_riesgos.id and riesgos.id_proceso_afecta = proceso_afectas.id and riesgos.id_probabilidad = probabilidads.id and riesgos.id_impacto = impactos.id and riesgos.id_accion = accions.id and riesgos.created_at BETWEEN ? and ?', [$request->get('fecha1'),$request->get('fecha2')]);
            return view ('vwReporteRiesgos', [
                'reporteRiesgos' => $reporteRiesgos
            ]);
        }


    }

}
