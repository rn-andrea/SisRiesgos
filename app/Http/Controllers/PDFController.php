<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
        public function cargarBD(Request $request)
        {
            $orden = $request->get('orden');

            if($orden=='generarpdf1')
            {
                $reporteusuarios = Usuario::all();
                return view ('vwReportePDF', [
                    'reporteusuarios' => $reporteusuarios
                ]);
            }else if($orden=='generarpdf2')
            {
                $reporteusuarios = DB::select('select * from usuarios where IND_ESTADO = ?', [1]);
                return view ('vwReportePDF', [
                    'reporteusuarios' => $reporteusuarios
                ]);
            }
            else if($orden=='generarpdf3')
            {
                $reporteusuarios = DB::select('select * from usuarios where IND_ESTADO = 2');
                return view ('vwReportePDF', [
                    'reporteusuarios' => $reporteusuarios
                ]);
            }

            if($orden=='generarpdf1Riesgos')
            {
                $reporteRiesgos = DB::select('SELECT riesgos.id, riesgos.nom_riesgos, categoria_riesgos.nom_categoria, riesgos.des_detalle, proceso_afectas.id_nomenclatura, probabilidads.nom_probabilidad, impactos.nom_impacto, riesgos.tot_calificacion, riesgos.num_pos_matriz, accions.nom_accion, riesgos.ind_afecta_servicio, riesgos.num_rto, riesgos.id_unidad_medida, riesgos.tot_tolerancia, riesgos.tot_capacidad, riesgos.usr_creacion, riesgos.usr_modifica, riesgos.ind_estado, riesgos.nom_archivo, riesgos.created_at, unidad_medidas.nom_unidad_medida FROM `riesgos`, `categoria_riesgos`, `proceso_afectas`, `probabilidads`, `impactos`, `accions`, `unidad_medidas` WHERE unidad_medidas.id = riesgos.id_unidad_medida and riesgos.id_categoria = categoria_riesgos.id and riesgos.id_proceso_afecta = proceso_afectas.id and riesgos.id_probabilidad = probabilidads.id and riesgos.id_impacto = impactos.id and riesgos.id_accion = accions.id;');
                return view ('vwReportePDFRiesgo', [
                    'reporteRiesgos' => $reporteRiesgos
                ]);
            }
            else if($orden=='generarpdf2Riesgos')
            {
                $reporteRiesgos = DB::select('SELECT riesgos.id, riesgos.nom_riesgos, categoria_riesgos.nom_categoria, riesgos.des_detalle, proceso_afectas.id_nomenclatura, probabilidads.nom_probabilidad, impactos.nom_impacto, riesgos.tot_calificacion, riesgos.num_pos_matriz, accions.nom_accion, riesgos.ind_afecta_servicio, riesgos.num_rto, riesgos.id_unidad_medida, riesgos.tot_tolerancia, riesgos.tot_capacidad, riesgos.usr_creacion, riesgos.usr_modifica, riesgos.ind_estado, riesgos.nom_archivo, riesgos.created_at, unidad_medidas.nom_unidad_medida FROM `riesgos`, `categoria_riesgos`, `proceso_afectas`, `probabilidads`, `impactos`, `accions`, `unidad_medidas` WHERE unidad_medidas.id = riesgos.id_unidad_medida and riesgos.id_categoria = categoria_riesgos.id and riesgos.id_proceso_afecta = proceso_afectas.id and riesgos.id_probabilidad = probabilidads.id and riesgos.id_impacto = impactos.id and riesgos.id_accion = accions.id order by proceso_afectas.id_nomenclatura ASC;');
                return view ('vwReportePDFRiesgo', [
                    'reporteRiesgos' => $reporteRiesgos
                ]);
            }
            else if($orden=='generarpdf3Riesgos')
            {
                $reporteRiesgos = DB::select('SELECT riesgos.id, riesgos.nom_riesgos, categoria_riesgos.nom_categoria, riesgos.des_detalle, proceso_afectas.id_nomenclatura, probabilidads.nom_probabilidad, impactos.nom_impacto, riesgos.tot_calificacion, riesgos.num_pos_matriz, accions.nom_accion, riesgos.ind_afecta_servicio, riesgos.num_rto, riesgos.id_unidad_medida, riesgos.tot_tolerancia, riesgos.tot_capacidad, riesgos.usr_creacion, riesgos.usr_modifica, riesgos.ind_estado, riesgos.nom_archivo, riesgos.created_at, unidad_medidas.nom_unidad_medida FROM `riesgos`, `categoria_riesgos`, `proceso_afectas`, `probabilidads`, `impactos`, `accions`, `unidad_medidas` WHERE unidad_medidas.id = riesgos.id_unidad_medida and riesgos.id_categoria = categoria_riesgos.id and riesgos.id_proceso_afecta = proceso_afectas.id and riesgos.id_probabilidad = probabilidads.id and riesgos.id_impacto = impactos.id and riesgos.id_accion = accions.id and riesgos.created_at BETWEEN ? and ?', [$request->get('fecha1'),$request->get('fecha2')]);
                return view ('vwReportePDFRiesgo', [
                    'reporteRiesgos' => $reporteRiesgos
                ]);
            }


            if($orden=='generarpdf1Eventos')
            {
                $reporteEventos = DB::select('SELECT eventos.id_evento, eventos.nom_evento, riesgos.nom_riesgos, eventos.fec_evento, eventos.des_situacion_pre, eventos.des_detalle_medidas, estado_resolucions.nom_estado_resolucion, accions.nom_accion, eventos.jus_evento_no_resuelto, eventos.jus_medida_aplicada, unidad_medidas.nom_unidad_medida, eventos.num_perdida_estimada, eventos.num_rto, eventos.des_lecciones_aprend, eventos.usr_creacion, eventos.usr_modifica, eventos.ind_estado FROM `eventos`, `riesgos`, `estado_resolucions`, `accions`, `unidad_medidas` where eventos.id_unidad_medida=unidad_medidas.id and riesgos.id = eventos.id_riesgos and eventos.id_estado_resolucion = estado_resolucions.id and eventos.id_accion = accions.id;');
                return view ('vwReportePDFEventos', [
                    'reporteEventos' => $reporteEventos
                ]);
            }else if($orden=='generarpdf2Eventos')
           {
            $year = date('Y');
            $reporteEventos = DB::select('SELECT eventos.id_evento, eventos.nom_evento, riesgos.nom_riesgos,eventos.fec_evento, eventos.des_situacion_pre,eventos.des_detalle_medidas,estado_resolucions.nom_estado_resolucion,accions.nom_accion,eventos.jus_evento_no_resuelto,eventos.jus_medida_aplicada,unidad_medidas.nom_unidad_medida,eventos.num_perdida_estimada,eventos.num_rto,eventos.des_lecciones_aprend,eventos.usr_creacion,eventos.usr_modifica,eventos.created_at,eventos.updated_at, eventos.ind_estado FROM `eventos`,`riesgos`, `usuarios`, `estado_resolucions`, `unidad_medidas`, `accions` WHERE eventos.id_riesgos = riesgos.id and eventos.id_estado_resolucion = estado_resolucions.id and eventos.usr_creacion = usuarios.id_usuario and eventos.usr_modifica = usuarios.id_usuario and eventos.id_unidad_medida = unidad_medidas.id and eventos.id_accion = accions.id and EXTRACT(YEAR FROM eventos.fec_evento) = ?',[$year]);
            return view ('vwReportePDFEventos', [
                'reporteEventos' => $reporteEventos
            ]);
            }else if($orden=='generarpdf3Eventos')
            {
                $reporteEventos = DB::select('SELECT eventos.id_evento, eventos.nom_evento, riesgos.nom_riesgos, eventos.fec_evento, eventos.des_situacion_pre, eventos.des_detalle_medidas, estado_resolucions.nom_estado_resolucion, accions.nom_accion, eventos.jus_evento_no_resuelto, eventos.jus_medida_aplicada, unidad_medidas.nom_unidad_medida, eventos.num_perdida_estimada, eventos.num_rto, eventos.des_lecciones_aprend, eventos.usr_creacion, eventos.usr_modifica, eventos.ind_estado FROM `eventos`, `riesgos`, `estado_resolucions`, `accions`, `unidad_medidas` where eventos.id_unidad_medida=unidad_medidas.id and riesgos.id = eventos.id_riesgos and eventos.id_estado_resolucion = estado_resolucions.id and eventos.id_accion = accions.id and eventos.id_estado_resolucion=1;');
                return view ('vwReportePDFEventos', [
                    'reporteEventos' => $reporteEventos
                ]);
            }else if($orden=='generarpdf4Eventos')
            {
                $reporteEventos = DB::select('SELECT eventos.id_evento, eventos.nom_evento, riesgos.nom_riesgos, eventos.fec_evento, eventos.des_situacion_pre, eventos.des_detalle_medidas, estado_resolucions.nom_estado_resolucion, accions.nom_accion, eventos.jus_evento_no_resuelto, eventos.jus_medida_aplicada, unidad_medidas.nom_unidad_medida, eventos.num_perdida_estimada, eventos.num_rto, eventos.des_lecciones_aprend, eventos.usr_creacion, eventos.usr_modifica, eventos.ind_estado FROM `eventos`, `riesgos`, `estado_resolucions`, `accions`, `unidad_medidas` where eventos.id_unidad_medida=unidad_medidas.id and riesgos.id = eventos.id_riesgos and eventos.id_estado_resolucion = estado_resolucions.id and eventos.id_accion = accions.id and eventos.id_estado_resolucion=2;');
                return view ('vwReportePDFEventos', [
                    'reporteEventos' => $reporteEventos
                ]);
            }else if($orden=='generarpdf5Eventos')
            {
                $reporteEventos = DB::select('SELECT eventos.id_evento, eventos.nom_evento, riesgos.nom_riesgos, eventos.fec_evento, eventos.des_situacion_pre, eventos.des_detalle_medidas, estado_resolucions.nom_estado_resolucion, accions.nom_accion, eventos.jus_evento_no_resuelto, eventos.jus_medida_aplicada, unidad_medidas.nom_unidad_medida, eventos.num_perdida_estimada, eventos.num_rto, eventos.des_lecciones_aprend, eventos.usr_creacion, eventos.usr_modifica, eventos.ind_estado FROM `eventos`, `riesgos`, `estado_resolucions`, `accions`, `unidad_medidas` where eventos.id_unidad_medida=unidad_medidas.id and riesgos.id = eventos.id_riesgos and eventos.id_estado_resolucion = estado_resolucions.id and eventos.id_accion = accions.id and eventos.id_estado_resolucion=3;');
                return view ('vwReportePDFEventos', [
                    'reporteEventos' => $reporteEventos
                ]);
            }

        }

}
