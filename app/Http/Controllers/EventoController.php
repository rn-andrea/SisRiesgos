<?php

namespace App\Http\Controllers;
use App\Models\Riesgo;
use App\Models\Usuario;
use App\Models\CategoriaRiesgo;
use App\Models\ProcesoAfecta;
use App\Models\EstadoResolucion;
use App\Models\Accion;
use App\Models\UnidadMedida;
use App\Models\Evento;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    
    public function index()
    {
        $Eventos = Evento::select('id','id_evento','nom_evento','id_riesgos','fec_evento','des_situacion_pre','des_detalle_medidas','id_estado_resolucion','id_accion','jus_evento_no_resuelto','jus_medida_aplicada','id_unidad_medida','num_perdida_estimada','num_rto','des_lecciones_aprend','usr_creacion','usr_modifica','created_at','updated_at','ind_estado')->orderBy('updated_at','DESC')->get();;
        $riesgo = Riesgo::select('id','id_riesgos','nom_riesgos')->where('ind_estado','1')->get();
        $estadoresolucion = EstadoResolucion::select('id','nom_estado_resolucion')->where('ind_estado','1')->get();
        $accionsel = Accion::select('id','nom_accion')->where('ind_estado','1')->get();
        $unidadmedidasel = UnidadMedida::select('id','nom_unidad_medida')->where('ind_estado','1')->get();

        return view('procesos.vwEventoR',
        [ 
            'Eventos'=> $Eventos,
            'riesgo'=>$riesgo,
            'estadoresolucion'=>$estadoresolucion,
            'accionsel'=> $accionsel,
            'unidadmedidasel'=>$unidadmedidasel,
        ]);
    }

    public function create()
    {
       // return view('mantenimientos.vwMantEstadosEventos'),
    }

    public function store(Request $request)
    {
        $Eventos= new Evento();        			  		   
        $Eventos-> nom_evento = $request-> get('NOM_EVENTO');
	    $Eventos-> nom_riesgo = $request-> get('NOM_RIESGO');
        $Eventos-> fec_evento = $request-> get('FEC_EVENTO');
	    $Eventos-> des_situacion_pre = $request-> get('DES_SITUACION_PRE');
        $Eventos-> des_detalle_medidas = $request-> get('DES_DETALLE_MEDIDAS');
        $Eventos-> id_estado_resolucion= $request-> get('ID_ESTADO_RESOLUCION');
	    $Eventos-> id_accion = $request-> get('ID_ACCION');
        $Eventos-> id_unidad_medida = $request-> get('ID_UNIDAD_MEDIDA');
        $Eventos-> jus_evento_no_resuelto = $request-> get('JUS_EVENTO_NO_RESUELTO');
        $Eventos-> jus_medida_aplicada = $request-> get('JUS_MEDIDA_APLICADA');
        $Eventos-> num_perdida_estimada= $request-> get('NUM_PERDIDA_ESTIMADA');
        $Eventos-> des_lecciones_aprend= $request-> get('DES_LECCIONES_APREND');
        $Eventos-> num_rto = $request-> get('NUM_RTO');
	    $Eventos-> ind_estado= $request-> get('IND_ESTADO');
	   	$Eventos-> usr_creacion = $request-> get('USR_CREACION ');
        $Eventos-> usr_modifica = $request-> get('USR_MODIFICA ');


        $Eventos-> save();
        return redirect('/procesos/vwEventoR');
    }

}
