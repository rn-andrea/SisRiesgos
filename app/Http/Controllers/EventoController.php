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
use App\Models\Revision;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    
    public function index()
    {
        $Eventos = Evento::select('id','id_evento','nom_evento','id_riesgos','fec_evento','des_situacion_pre','des_detalle_medidas','id_estado_resolucion','id_accion','jus_evento_no_resuelto','jus_medida_aplicada','id_unidad_medida','num_perdida_estimada','num_rto','des_lecciones_aprend','usr_creacion','usr_modifica','created_at','updated_at','ind_estado')->orderBy('updated_at','DESC')->get();;
        $riesgo = Riesgo::select('id','id_riesgos','nom_riesgos','id_accion')->where('ind_estado','1')->get();
        $estadoresolucion = EstadoResolucion::select('id','nom_estado_resolucion')->where('ind_estado','1')->get();
        $accionsel = Accion::select('id','nombre_accion')->where('ind_estado','1')->get();
        $unidadmedidasel = UnidadMedida::select('id','nom_unidad_medida')->where('ind_estado','1')->get();
       // $riesgo = Riesgo::select('id','id_riesgos','nom_riesgos','id_accion')->where('ind_estado','1')->where('id_riesgo',$riesgo['id'])->value('id_accion');
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
       $correo = auth()->user()->email;
       $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
       
        $Eventos= new Evento();  
        $this->validate($request, [
            'nom_evento'=> 'required|max:50|min:3|unique:eventos',
            'fec_evento'=> 'required|date',
            'des_situacion_pre'=> 'required',
            'num_perdida_estimada'=> 'numeric',

        ]);      
        $dato1= $request->id_evento;	
        $dato2=DB::table('eventos')->select('id');
        $contador= $dato2->count()+1;

        $Eventos-> id_evento = $dato1.$contador;
        $Eventos-> nom_evento = $request-> get('nom_evento');
	    $Eventos-> id_riesgos = $request-> get('id_riesgos');
        $Eventos-> fec_evento = $request-> get('fec_evento');
	    $Eventos-> des_situacion_pre = $request-> get('des_situacion_pre');
        $Eventos-> des_detalle_medidas = $request-> get('des_detalle_medidas');
        $Eventos-> id_estado_resolucion= $request-> get('id_estado_resolucion');
	    $Eventos-> id_accion = $request-> get('id_accion');
        $Eventos-> id_unidad_medida = $request-> get('id_unidad_medida');
        $Eventos-> jus_evento_no_resuelto = $request-> get('jus_evento_no_resuelto');
        $Eventos-> jus_medida_aplicada = $request-> get('jus_medida_aplicada');
        $Eventos-> num_perdida_estimada= $request-> get('num_perdida_estimada');
        $Eventos-> des_lecciones_aprend= $request-> get('des_lescciones_aprend');
        $Eventos-> num_rto = $request-> get('rto');
	    $Eventos-> ind_estado= $request-> get('estado');
	   	$Eventos-> usr_creacion = $consultausr;
        $Eventos-> usr_modifica = $consultausr;


        $Eventos-> save();
        $consultanom = DB::table('usuarios')->select('usr_nombre')->where('id_usuario',$consultausr)->value('usr_nombre');
        $consultapell = DB::table('usuarios')->select('usr_apellidos')->where('id_usuario',$consultausr)->value('usr_apellidos');
        $revision = new Revision();
        $revision-> codigo= $dato1.$contador;
        $revision->nombre=$request-> get('nom_evento');
        $revision->descripcion='Creación de evento';
        $revision->usuario=$consultanom.' '.$consultapell;
        $revision-> save();
        return redirect('/procesos/vwEventoR')->with('Agregar','ok');
    }
    public function show($id)
    {
        //return $id;
       
        $event= Evento::findOrFail($id);
        $Eventos = Evento::select('id','id_evento','nom_evento','id_riesgos','fec_evento','des_situacion_pre','des_detalle_medidas','id_estado_resolucion','id_accion','jus_evento_no_resuelto','jus_medida_aplicada','id_unidad_medida','num_perdida_estimada','num_rto','des_lecciones_aprend','usr_creacion','usr_modifica','created_at','updated_at','ind_estado')->orderBy('updated_at','DESC')->get();;
        $condicion2=Evento::where('id',$id)->select('id_riesgos')->value('id_riesgos');
        $riesgo = Riesgo::select('id','id_riesgos','nom_riesgos','id_accion')->where('ind_estado','1')->where('id','!=',$condicion2)->get();
        $condicion3=Evento::where('id',$id)->select('id_estado_resolucion')->value('id_estado_resolucion');
        $estadoresolucion = EstadoResolucion::select('id','nom_estado_resolucion')->where('ind_estado','1')->where('id','!=',$condicion3)->get();
        $condicion4=Evento::where('id',$id)->select('id_accion')->value('id_accion');
        $accionsel = Accion::select('id','nombre_accion')->where('ind_estado','1')->where('id','!=',$condicion4)->get();
        $condicion5=Evento::where('id',$id)->select('id_unidad_medida')->value('id_unidad_medida');
        $unidadmedidasel = UnidadMedida::select('id','nom_unidad_medida')->where('ind_estado','1')->where('id','!=',$condicion5)->get();
       // $riesgo = Riesgo::select('id','id_riesgos','nom_riesgos','id_accion')->where('ind_estado','1')->where('id_riesgo',$riesgo['id'])->value('id_accion');
        return view('procesos.vwEventoRMod',
        [ 
            'Eventos'=> $Eventos,
            'riesgo'=>$riesgo,
            'estadoresolucion'=>$estadoresolucion,
            'accionsel'=> $accionsel,
            'unidadmedidasel'=>$unidadmedidasel,
            'event'=>$event,
        ]);
    } 
    public function update(Request $request, $id)
    {
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
       
        $event= Evento::findOrFail($id);
        $verificardatoa= $request->nom_evento;
      
        $verificardato3= DB::table('eventos')->select('nom_evento')->where('nom_evento',$verificardatoa);
        $existencia2= $verificardato3->count();

        $this->validate($request, [
            'nom_evento'=> 'required|max:50|min:3',
            'fec_evento'=> 'required|date',
            'des_situacion_pre'=> 'required',
            'num_perdida_estimada'=> 'numeric',

        ]);

       $consultacd = DB::table('eventos')->select('id')->where('nom_evento',$verificardatoa)->where('id',$id);
        $existencia= $consultacd->count();
        $dato2=DB::table('eventos')->select('id')->where('id',$id)->value('id');;
        $consultanom = DB::table('usuarios')->select('usr_nombre')->where('id_usuario',$consultausr)->value('usr_nombre');
        $consultapell = DB::table('usuarios')->select('usr_apellidos')->where('id_usuario',$consultausr)->value('usr_apellidos');
        if($existencia==1){

            $event-> nom_evento = $request->nom_evento;
            $event-> id_riesgos = $request->id_riesgos;
            $event-> fec_evento = $request->fec_evento;
            $event-> des_situacion_pre = $request->des_situacion_pre;
            $event-> des_detalle_medidas = $request->des_detalle_medidas;
            $event-> id_estado_resolucion = $request->id_estado_resolucion;
            $event-> id_accion = $request->id_accion;
            $event-> id_unidad_medida =  $request->id_unidad_medida;
            $event-> jus_evento_no_resuelto = $request->jus_evento_no_resuelto;
            $event-> jus_medida_aplicada = $request->jus_medida_aplicada;
            $event-> num_perdida_estimada = $request-> num_perdida_estimada;
            $event-> des_lecciones_aprend = $request->des_lecciones_aprend;
            $event->  num_rto= $request-> rto;
            $event-> ind_estado = $request->estado;
            $event-> usr_modifica = $consultausr;
              
               $event-> save();
              
                $revision = new Revision();
                $revision-> codigo= $dato2 ;
                $revision->nombre=$request-> get('nom_evento');
                $revision->descripcion='Modificación de evento';
                $revision->usuario=$consultanom.' '.$consultapell;
                $revision-> save();
                return REDIRECT ('/evento')->with('Modificar','ok');
            

        }else{
            if( $existencia2 > 0){
                return back()->with('Error','error');
            }else{
                $event-> nom_evento = $request->nom_evento;
                $event-> id_riesgos = $request->id_riesgos;
                $event-> fec_evento = $request->fec_evento;
                $event-> des_situacion_pre = $request->des_situacion_pre;
                $event-> des_detalle_medidas = $request->des_detalle_medidas;
                $event-> id_estado_resolucion = $request->id_estado_resolucion;
                $event-> id_accion = $request->id_accion;
                $event-> id_unidad_medida =  $request->id_unidad_medida;
                $event-> jus_evento_no_resuelto = $request->jus_evento_no_resuelto;
                $event-> jus_medida_aplicada = $request->jus_medida_aplicada;
                $event-> num_perdida_estimada = $request-> num_perdida_estimada;
                $event-> des_lecciones_aprend = $request->des_lecciones_aprend;
                $event->  num_rto= $request-> rto;
                $event-> ind_estado = $request->estado;
                $event-> usr_modifica = $consultausr;
                  
                $revision = new Revision();
                $revision-> codigo= $dato2;
                $revision->nombre=$request-> get('nom_evento');
                $revision->descripcion='Modificación de evento';
                $revision->usuario=$consultanom.' '.$consultapell;
                $revision-> save();
                return REDIRECT ('/evento')->with('Modificar','ok');
                
        }
   
    }
}
}
