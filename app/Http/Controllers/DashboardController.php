<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function inicio(Request $request)
    {
        try{
                if($request->get('consulta')=="minimo")
                {

                $reporteRiesgos = DB::select('SELECT riesgos.id, riesgos.nom_riesgos, categoria_riesgos.nom_categoria, riesgos.des_detalle, proceso_afectas.id_nomenclatura, probabilidads.nom_probabilidad, impactos.nom_impacto, riesgos.tot_calificacion, riesgos.num_pos_matriz, accions.nom_accion, riesgos.ind_afecta_servicio, riesgos.num_rto, riesgos.id_unidad_medida, riesgos.tot_tolerancia, riesgos.tot_capacidad, riesgos.usr_creacion, riesgos.usr_modifica, riesgos.ind_estado, riesgos.nom_archivo, riesgos.created_at, unidad_medidas.nom_unidad_medida FROM `riesgos`, `categoria_riesgos`, `proceso_afectas`, `probabilidads`, `impactos`, `accions`, `unidad_medidas` WHERE unidad_medidas.id = riesgos.id_unidad_medida and riesgos.id_categoria = categoria_riesgos.id and riesgos.id_proceso_afecta = proceso_afectas.id and riesgos.id_probabilidad = probabilidads.id and riesgos.id_impacto = impactos.id and riesgos.id_accion = accions.id and riesgos.id_probabilidad * riesgos.id_impacto<=4;');

                return view ('vwDashboard', [
                    'reporteRiesgos' => $reporteRiesgos
                ]);
                }else if($request->get('consulta')=="bajo")
                {

                $reporteRiesgos = DB::select('SELECT riesgos.id, riesgos.nom_riesgos, categoria_riesgos.nom_categoria, riesgos.des_detalle, proceso_afectas.id_nomenclatura, probabilidads.nom_probabilidad, impactos.nom_impacto, riesgos.tot_calificacion, riesgos.num_pos_matriz, accions.nom_accion, riesgos.ind_afecta_servicio, riesgos.num_rto, riesgos.id_unidad_medida, riesgos.tot_tolerancia, riesgos.tot_capacidad, riesgos.usr_creacion, riesgos.usr_modifica, riesgos.ind_estado, riesgos.nom_archivo, riesgos.created_at, unidad_medidas.nom_unidad_medida FROM `riesgos`, `categoria_riesgos`, `proceso_afectas`, `probabilidads`, `impactos`, `accions`, `unidad_medidas` WHERE unidad_medidas.id = riesgos.id_unidad_medida and riesgos.id_categoria = categoria_riesgos.id and riesgos.id_proceso_afecta = proceso_afectas.id and riesgos.id_probabilidad = probabilidads.id and riesgos.id_impacto = impactos.id and riesgos.id_accion = accions.id and riesgos.id_probabilidad * riesgos.id_impacto>=5 and riesgos.id_probabilidad * riesgos.id_impacto<=9;');

                return view ('vwDashboard', [
                    'reporteRiesgos' => $reporteRiesgos
                ]);
                }else if($request->get('consulta')=="moderado")
                {

                $reporteRiesgos = DB::select('SELECT riesgos.id, riesgos.nom_riesgos, categoria_riesgos.nom_categoria, riesgos.des_detalle, proceso_afectas.id_nomenclatura, probabilidads.nom_probabilidad, impactos.nom_impacto, riesgos.tot_calificacion, riesgos.num_pos_matriz, accions.nom_accion, riesgos.ind_afecta_servicio, riesgos.num_rto, riesgos.id_unidad_medida, riesgos.tot_tolerancia, riesgos.tot_capacidad, riesgos.usr_creacion, riesgos.usr_modifica, riesgos.ind_estado, riesgos.nom_archivo, riesgos.created_at, unidad_medidas.nom_unidad_medida FROM `riesgos`, `categoria_riesgos`, `proceso_afectas`, `probabilidads`, `impactos`, `accions`, `unidad_medidas` WHERE unidad_medidas.id = riesgos.id_unidad_medida and riesgos.id_categoria = categoria_riesgos.id and riesgos.id_proceso_afecta = proceso_afectas.id and riesgos.id_probabilidad = probabilidads.id and riesgos.id_impacto = impactos.id and riesgos.id_accion = accions.id and riesgos.id_probabilidad * riesgos.id_impacto>=10 and riesgos.id_probabilidad * riesgos.id_impacto<=14;');

                return view ('vwDashboard', [
                    'reporteRiesgos' => $reporteRiesgos
                ]);
                }else if($request->get('consulta')=="alto")
                {

                $reporteRiesgos = DB::select('SELECT riesgos.id, riesgos.nom_riesgos, categoria_riesgos.nom_categoria, riesgos.des_detalle, proceso_afectas.id_nomenclatura, probabilidads.nom_probabilidad, impactos.nom_impacto, riesgos.tot_calificacion, riesgos.num_pos_matriz, accions.nom_accion, riesgos.ind_afecta_servicio, riesgos.num_rto, riesgos.id_unidad_medida, riesgos.tot_tolerancia, riesgos.tot_capacidad, riesgos.usr_creacion, riesgos.usr_modifica, riesgos.ind_estado, riesgos.nom_archivo, riesgos.created_at, unidad_medidas.nom_unidad_medida FROM `riesgos`, `categoria_riesgos`, `proceso_afectas`, `probabilidads`, `impactos`, `accions`, `unidad_medidas` WHERE unidad_medidas.id = riesgos.id_unidad_medida and riesgos.id_categoria = categoria_riesgos.id and riesgos.id_proceso_afecta = proceso_afectas.id and riesgos.id_probabilidad = probabilidads.id and riesgos.id_impacto = impactos.id and riesgos.id_accion = accions.id and riesgos.id_probabilidad * riesgos.id_impacto>=15 and riesgos.id_probabilidad * riesgos.id_impacto<=19;');

                return view ('vwDashboard', [
                    'reporteRiesgos' => $reporteRiesgos
                ]);
                }else if($request->get('consulta')=="critico")
                {

                $reporteRiesgos = DB::select('SELECT riesgos.id, riesgos.nom_riesgos, categoria_riesgos.nom_categoria, riesgos.des_detalle, proceso_afectas.id_nomenclatura, probabilidads.nom_probabilidad, impactos.nom_impacto, riesgos.tot_calificacion, riesgos.num_pos_matriz, accions.nom_accion, riesgos.ind_afecta_servicio, riesgos.num_rto, riesgos.id_unidad_medida, riesgos.tot_tolerancia, riesgos.tot_capacidad, riesgos.usr_creacion, riesgos.usr_modifica, riesgos.ind_estado, riesgos.nom_archivo, riesgos.created_at, unidad_medidas.nom_unidad_medida FROM `riesgos`, `categoria_riesgos`, `proceso_afectas`, `probabilidads`, `impactos`, `accions`, `unidad_medidas` WHERE unidad_medidas.id = riesgos.id_unidad_medida and riesgos.id_categoria = categoria_riesgos.id and riesgos.id_proceso_afecta = proceso_afectas.id and riesgos.id_probabilidad = probabilidads.id and riesgos.id_impacto = impactos.id and riesgos.id_accion = accions.id and riesgos.id_probabilidad * riesgos.id_impacto>=20 and riesgos.id_probabilidad * riesgos.id_impacto<=25;');

                return view ('vwDashboard', [
                    'reporteRiesgos' => $reporteRiesgos
                ]);
                }else if($request->get('consulta')=="todos")
                {

                    $reporteRiesgos = DB::select('SELECT riesgos.id, riesgos.nom_riesgos, categoria_riesgos.nom_categoria, riesgos.des_detalle, proceso_afectas.id_nomenclatura, probabilidads.nom_probabilidad, impactos.nom_impacto, riesgos.tot_calificacion, riesgos.num_pos_matriz, accions.nom_accion, riesgos.ind_afecta_servicio, riesgos.num_rto, riesgos.id_unidad_medida, riesgos.tot_tolerancia, riesgos.tot_capacidad, riesgos.usr_creacion, riesgos.usr_modifica, riesgos.ind_estado, riesgos.nom_archivo, riesgos.created_at, unidad_medidas.nom_unidad_medida FROM `riesgos`, `categoria_riesgos`, `proceso_afectas`, `probabilidads`, `impactos`, `accions`, `unidad_medidas` WHERE unidad_medidas.id = riesgos.id_unidad_medida and riesgos.id_categoria = categoria_riesgos.id and riesgos.id_proceso_afecta = proceso_afectas.id and riesgos.id_probabilidad = probabilidads.id and riesgos.id_impacto = impactos.id and riesgos.id_accion = accions.id;');

                    return view ('vwDashboard', [
                        'reporteRiesgos' => $reporteRiesgos
                    ]);
                }
                else{
                $parametros2 = explode("x",$request->get('consulta'));
                $reporteRiesgos = DB::select('SELECT riesgos.id, riesgos.nom_riesgos, categoria_riesgos.nom_categoria, riesgos.des_detalle, proceso_afectas.id_nomenclatura, probabilidads.nom_probabilidad, impactos.nom_impacto, riesgos.tot_calificacion, riesgos.num_pos_matriz, accions.nom_accion, riesgos.ind_afecta_servicio, riesgos.num_rto, riesgos.id_unidad_medida, riesgos.tot_tolerancia, riesgos.tot_capacidad, riesgos.usr_creacion, riesgos.usr_modifica, riesgos.ind_estado, riesgos.nom_archivo, riesgos.created_at, unidad_medidas.nom_unidad_medida FROM `riesgos`, `categoria_riesgos`, `proceso_afectas`, `probabilidads`, `impactos`, `accions`, `unidad_medidas` WHERE unidad_medidas.id = riesgos.id_unidad_medida and riesgos.id_categoria = categoria_riesgos.id and riesgos.id_proceso_afecta = proceso_afectas.id and riesgos.id_probabilidad = probabilidads.id and riesgos.id_impacto = impactos.id and riesgos.id_accion = accions.id and riesgos.id_probabilidad=? and riesgos.id_impacto=?;',[$parametros2[0], $parametros2[1]]);

                return view ('vwDashboard', [
                    'reporteRiesgos' => $reporteRiesgos
                ]);
            }

        } catch (Exception $e)
         {
            $reporteRiesgos = DB::select('SELECT riesgos.id, riesgos.nom_riesgos, categoria_riesgos.nom_categoria, riesgos.des_detalle, proceso_afectas.id_nomenclatura, probabilidads.nom_probabilidad, impactos.nom_impacto, riesgos.tot_calificacion, riesgos.num_pos_matriz, accions.nom_accion, riesgos.ind_afecta_servicio, riesgos.num_rto, riesgos.id_unidad_medida, riesgos.tot_tolerancia, riesgos.tot_capacidad, riesgos.usr_creacion, riesgos.usr_modifica, riesgos.ind_estado, riesgos.nom_archivo, riesgos.created_at, unidad_medidas.nom_unidad_medida FROM `riesgos`, `categoria_riesgos`, `proceso_afectas`, `probabilidads`, `impactos`, `accions`, `unidad_medidas` WHERE unidad_medidas.id = riesgos.id_unidad_medida and riesgos.id_categoria = categoria_riesgos.id and riesgos.id_proceso_afecta = proceso_afectas.id and riesgos.id_probabilidad = probabilidads.id and riesgos.id_impacto = impactos.id and riesgos.id_accion = accions.id;');

                return view ('vwDashboard', [
                    'reporteRiesgos' => $reporteRiesgos
                ]);
         }


    }


}
