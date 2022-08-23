<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteEventosController extends Controller
{
    public function inicio(Request $request)
    {
        if($request->get('orden')=='1')
        //tomar en cuenta que cuando se levanta la página, la orden va ser 1 ---------------------------
        {
            $reporteEventos = DB::select('SELECT eventos.id_evento, eventos.nom_evento, riesgos.nom_riesgos, eventos.fec_evento, eventos.des_situacion_pre, eventos.des_detalle_medidas, estado_resolucions.nom_estado_resolucion, accions.nombre_accion, eventos.jus_evento_no_resuelto, eventos.jus_medida_aplicada, unidad_medidas.nom_unidad_medida, eventos.num_perdida_estimada, eventos.num_rto, eventos.des_lecciones_aprend, eventos.usr_creacion, eventos.usr_modifica, eventos.ind_estado FROM `eventos`, `riesgos`, `estado_resolucions`, `accions`, `unidad_medidas` where eventos.id_unidad_medida=unidad_medidas.id and riesgos.id = eventos.id_riesgos and eventos.id_estado_resolucion = estado_resolucions.id and eventos.id_accion = accions.id;');
            return view ('vwReporteEventos', [
                'reporteEventos' => $reporteEventos
            ]);
        }else if($request->get('orden')=='2')
        //Esto lo está haciendo Andrea---------------------------
        {
            $year = date('Y');
            $reporteEventos = DB::select('SELECT eventos.id_evento, eventos.nom_evento, riesgos.nom_riesgos,eventos.fec_evento, eventos.des_situacion_pre,eventos.des_detalle_medidas,estado_resolucions.nom_estado_resolucion,accions.nombre_accion,eventos.jus_evento_no_resuelto,eventos.jus_medida_aplicada,unidad_medidas.nom_unidad_medida,eventos.num_perdida_estimada,eventos.num_rto,eventos.des_lecciones_aprend,eventos.usr_creacion,eventos.usr_modifica,eventos.created_at,eventos.updated_at, eventos.ind_estado FROM `eventos`,`riesgos`, `usuarios`, `estado_resolucions`, `unidad_medidas`, `accions` WHERE eventos.id_riesgos = riesgos.id and eventos.id_estado_resolucion = estado_resolucions.id and eventos.usr_creacion = usuarios.id_usuario and eventos.usr_modifica = usuarios.id_usuario and eventos.id_unidad_medida = unidad_medidas.id and eventos.id_accion = accions.id and EXTRACT(YEAR FROM eventos.fec_evento) = ?',[$year]);
        return view ('vwReporteEventos', [
            'reporteEventos' => $reporteEventos
        ]);
        }else if($request->get('orden')=='3')
        {
            $reporteEventos = DB::select('SELECT eventos.id_evento, eventos.nom_evento, riesgos.nom_riesgos, eventos.fec_evento, eventos.des_situacion_pre, eventos.des_detalle_medidas, estado_resolucions.nom_estado_resolucion, accions.nombre_accion, eventos.jus_evento_no_resuelto, eventos.jus_medida_aplicada, unidad_medidas.nom_unidad_medida, eventos.num_perdida_estimada, eventos.num_rto, eventos.des_lecciones_aprend, eventos.usr_creacion, eventos.usr_modifica, eventos.ind_estado FROM `eventos`, `riesgos`, `estado_resolucions`, `accions`, `unidad_medidas` where eventos.id_unidad_medida=unidad_medidas.id and riesgos.id = eventos.id_riesgos and eventos.id_estado_resolucion = estado_resolucions.id and eventos.id_accion = accions.id and eventos.id_estado_resolucion=1;');
            return view ('vwReporteEventos', [
                'reporteEventos' => $reporteEventos
            ]);
        }else if($request->get('orden')=='4')
        {
            $reporteEventos = DB::select('SELECT eventos.id_evento, eventos.nom_evento, riesgos.nom_riesgos, eventos.fec_evento, eventos.des_situacion_pre, eventos.des_detalle_medidas, estado_resolucions.nom_estado_resolucion, accions.nombre_accion, eventos.jus_evento_no_resuelto, eventos.jus_medida_aplicada, unidad_medidas.nom_unidad_medida, eventos.num_perdida_estimada, eventos.num_rto, eventos.des_lecciones_aprend, eventos.usr_creacion, eventos.usr_modifica, eventos.ind_estado FROM `eventos`, `riesgos`, `estado_resolucions`, `accions`, `unidad_medidas` where eventos.id_unidad_medida=unidad_medidas.id and riesgos.id = eventos.id_riesgos and eventos.id_estado_resolucion = estado_resolucions.id and eventos.id_accion = accions.id and eventos.id_estado_resolucion=2;');
            return view ('vwReporteEventos', [
                'reporteEventos' => $reporteEventos
            ]);
        }else if($request->get('orden')=='5')
        {
            $reporteEventos = DB::select('SELECT eventos.id_evento, eventos.nom_evento, riesgos.nom_riesgos, eventos.fec_evento, eventos.des_situacion_pre, eventos.des_detalle_medidas, estado_resolucions.nom_estado_resolucion, accions.nombre_accion, eventos.jus_evento_no_resuelto, eventos.jus_medida_aplicada, unidad_medidas.nom_unidad_medida, eventos.num_perdida_estimada, eventos.num_rto, eventos.des_lecciones_aprend, eventos.usr_creacion, eventos.usr_modifica, eventos.ind_estado FROM `eventos`, `riesgos`, `estado_resolucions`, `accions`, `unidad_medidas` where eventos.id_unidad_medida=unidad_medidas.id and riesgos.id = eventos.id_riesgos and eventos.id_estado_resolucion = estado_resolucions.id and eventos.id_accion = accions.id and eventos.id_estado_resolucion=3;');
            return view ('vwReporteEventos', [
                'reporteEventos' => $reporteEventos
            ]);
        }
         

    }
}