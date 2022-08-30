<?php

namespace App\Http\Controllers;
use App\Models\Riesgo;
use App\Models\Usuario;
use App\Models\CategoriaRiesgo;
use App\Models\ProcesoAfecta;
use App\Models\Probabilidad;
use App\Models\Impacto;
use App\Models\Accion;
use App\Models\UnidadMedida;
use App\Models\Revision;
use App\Models\RespondableProcesoAfecta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RiesgoController extends Controller
{

    public function index()
    {
        $riesgos = Riesgo::select('id','id_riesgos','nom_riesgos','id_categoria','des_detalle','id_proceso_afecta','id_probabilidad','id_impacto','tot_calificacion','num_pos_matriz','id_accion','ind_afecta_servicio','num_rto','id_unidad_medida','tot_tolerancia','tot_capacidad','usr_creacion','usr_modifica','created_at','updated_at','ind_estado','nom_archivo')->orderBy('updated_at','DESC')->get();
        $categorias= CategoriaRiesgo::all();
        $categoriasel = CategoriaRiesgo::select('id','nombre_categoria')->where('ind_estado','1')->get();
        $procesoafectasel = ProcesoAfecta::select('id','nom_proceso_afecta')->where('ind_estado','1')->get();
        $probabilidadsel = Probabilidad::select('id','nom_probabilidad')->where('ind_estado','1')->get();
        $impactosel = Impacto::select('id','nom_impacto')->where('ind_estado','1')->get();
        $accionsel = Accion::select('id','nombre_accion')->where('ind_estado','1')->get();
        $unidadmedidasel = UnidadMedida::select('id','nom_unidad_medida')->where('ind_estado','1')->get();
        //$reponsable= RespondableProcesoAfecta::select('id','usr_responsable_proceso','id_proceso_afecta')->where('ind_estado','1')->where('ind_estado','1')->where('id_proceso_afecta',$)

        return view('procesos.vwIdentificar',
        [
            'riesgos'=> $riesgos,
            'categoriasel'=> $categoriasel,
            'categorias'=> $categorias,
            'probabilidadsel'=>  $probabilidadsel,
            'procesoafectasel'=>$procesoafectasel,
            'impactosel'=>$impactosel,
            'accionsel'=>$accionsel,
            'unidadmedidasel'=>$unidadmedidasel,

        ]);
    }

    public function create()
    {
        //return view('procesos.vwIdentificar');
    }

    public function store(Request $request)
    {

        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
        $consultanom = DB::table('usuarios')->select('usr_nombre')->where('id_usuario',$consultausr)->value('usr_nombre');
        $consultapell = DB::table('usuarios')->select('usr_apellidos')->where('id_usuario',$consultausr)->value('usr_apellidos');

        $Riesgos = new Riesgo();
        $this->validate($request, [
            'nom_riesgos'=> 'required|max:50|min:3|unique:riesgos',
            'detalle'=> 'required|max:2000',
            'tolerancia'=> 'numeric',
            'capacidad'=> 'numeric',

        ]);

        $verificardato1= $request->id_proceso_afecta;
        $consulta = DB::table('proceso_afectas')->select('id_nomenclatura')->where('id',$verificardato1)->value('id_nomenclatura');
        $val1= $request->id_probabilidad;
        $val2= $request->id_impacto;
        $dato1= $request->id_riesgo;
        $dato2=DB::table('riesgos')->select('id');
        $contador= $dato2->count()+1;
        
        
        $Riesgos-> id_riesgos = $dato1.$consulta.'-'.$contador;
        $Riesgos-> nom_riesgos = $request-> get('nom_riesgos');
        $Riesgos-> id_categoria = $request-> get('id_categoria');
        $Riesgos-> des_detalle = $request-> get('detalle');
        $Riesgos-> id_proceso_afecta= $request-> get('id_proceso_afecta');;
        $Riesgos-> id_probabilidad = $request-> get('id_probabilidad');
	    $Riesgos-> id_impacto = $request-> get('id_impacto');
        $Riesgos-> tot_calificacion =  $request-> get('calificacion');
        $Riesgos-> num_pos_matriz = $val1.$val2;
        $Riesgos-> id_accion = $request-> get('id_accion');
	    $Riesgos-> ind_afecta_servicio= $request-> get('ind_afecta_servicio');
	    $Riesgos-> num_rto= $request-> get('rto');
	    $Riesgos-> id_unidad_medida= $request-> get('id_unidad_medida');
	    $Riesgos-> tot_tolerancia = $request-> get('tolerancia');
	    $Riesgos-> tot_capacidad= $request-> get('capacidad');
	    $Riesgos-> ind_estado= $request-> get('estado');
        $Riesgos-> usr_creacion= $consultausr;
        $Riesgos-> usr_modifica= $consultausr;

        if(!is_null($request->file('inpArchivo')))
        {
            $Riesgos ->nom_archivo = $request->file('inpArchivo')->store('public');
        }
        

        $Riesgos-> save();

        $revision = new Revision();
        $revision-> codigo= $dato1.$consulta.'-'.$contador;
        $revision->nombre=$request-> get('nom_riesgos');
        $revision->descripcion='Creación de riesgo';
        $revision->usuario=$consultanom.' '.$consultapell;
        $revision-> save();
        
        return redirect('/identificarriesgo')->with('Agregar','ok');
    }

    public function show($id)
    {
        //return $id;
        
        
        $riesgos = Riesgo::all();
        $riesg= Riesgo::findOrFail($id);
        $nomArchivo=DB::table('riesgos')->select('nom_archivo')->where('id',$id)->value('nom_archivo'); 
        $categorias= CategoriaRiesgo::all();
        $condicion= Riesgo::where('id',$id)->select('id_categoria')->value('id_categoria');
        $categoriasel = CategoriaRiesgo::select('id','nombre_categoria')->where('id','!=',$condicion)->where('ind_estado','1')->get();
        $condicion2=Riesgo::where('id',$id)->select('id_proceso_afecta')->value('id_proceso_afecta');
        $procesoafectasel = ProcesoAfecta::select('id','nom_proceso_afecta')->where('id','!=',$condicion2)->where('ind_estado','1')->get();
        $condicion3=Riesgo::where('id',$id)->select('id_probabilidad')->value('id_probabilidad');
        $probabilidadsel = Probabilidad::select('id','nom_probabilidad')->where('id','!=',$condicion3)->where('ind_estado','1')->get();
        $condicion4=Riesgo::where('id',$id)->select('id_impacto')->value('id_impacto');
        $impactosel = Impacto::select('id','nom_impacto')->where('id','!=',$condicion4)->where('ind_estado','1')->get();
        $condicion5=Riesgo::where('id',$id)->select('id_accion')->value('id_accion');
        $accionsel = Accion::select('id','nombre_accion')->where('id','!=',$condicion5)->where('ind_estado','1')->get();
        $condicion6=Riesgo::where('id',$id)->select('id_unidad_medida')->value('id_unidad_medida');
        $unidadmedidasel = UnidadMedida::select('id','nom_unidad_medida')->where('id','!=',$condicion6)->where('ind_estado','1')->get();

        return view('procesos.vwIdentificarMod',
        [
            'riesgos'=> $riesgos,
            'riesg'=>$riesg,
            'categoriasel'=> $categoriasel,
            'categorias'=> $categorias,
            'probabilidadsel'=>   $probabilidadsel,
            'procesoafectasel'=>$procesoafectasel,
            'impactosel'=>$impactosel,
            'accionsel'=>$accionsel,
            'unidadmedidasel'=>$unidadmedidasel,
            'nomArchivo'=>$nomArchivo
        ]);
        
        
      
        

    }
    public function update(Request $request, $id)
    {
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
       
        $consultanom = DB::table('usuarios')->select('usr_nombre')->where('id_usuario',$consultausr)->value('usr_nombre');
        $consultapell = DB::table('usuarios')->select('usr_apellidos')->where('id_usuario',$consultausr)->value('usr_apellidos');

        $riesg= Riesgo::findOrFail($id);
        $verificardatoa= $request->nom_riesgos;
      
        $verificardato3= DB::table('riesgos')->select('nom_riesgos')->where('nom_riesgos',$verificardatoa);
        $existencia2= $verificardato3->count();

        $this->validate($request, [
            'nom_riesgos'=> 'required|max:50|min:3',
            'detalle'=> 'required|max:2000',
            'tolerancia'=> 'numeric',
            'capacidad'=> 'numeric',

        ]);

       $consultacd = DB::table('riesgos')->select('id')->where('nom_riesgos',$verificardatoa)->where('id',$id);
        $existencia= $consultacd->count();

        $val1= $request->id_probabilidad;
        $val2= $request->id_impacto;
        $dato1= $request->id_riesgo;
        $verificardato1= $request->id_proceso_afecta;
        $consulta = DB::table('proceso_afectas')->select('id_nomenclatura')->where('id',$verificardato1)->value('id_nomenclatura');

        if($existencia==1){
           
                $riesg-> id_riesgos = $dato1.$consulta.'-'.$id;
                $riesg-> nom_riesgos = $request->nom_riesgos;
                $riesg-> id_categoria = $request->id_categoria;
                $riesg-> des_detalle = $request->detalle;
                $riesg-> id_proceso_afecta = $request->id_proceso_afecta;
                $riesg-> id_probabilidad = $request->id_probabilidad;
                $riesg-> id_impacto = $request->id_impacto;
                $riesg-> tot_calificacion = $request-> calificacion;
                $riesg-> num_pos_matriz = $val1.$val2;
                $riesg-> id_accion = $request->id_accion;
                $riesg-> ind_afecta_servicio = $request->ind_afecta_servicio;
                $riesg-> num_rto = $request-> rto;
                $riesg-> id_unidad_medida = $request->id_unidad_medida;
                $riesg-> tot_tolerancia = $request->tolerancia;
                $riesg-> tot_capacidad = $request->capacidad;
                $riesg-> ind_estado = $request->estado;
                $riesg-> usr_modifica = $consultausr;
                if(!is_null($request->file('inpArchivo')))
                {
                    $riesg-> nom_archivo = $request->file('inpArchivo')->store('public');
                }
              
                $riesg-> save();
                 
                $revision = new Revision();
                $revision-> codigo= $dato1.$consulta.'-'.$id;
                $revision->nombre=$request-> get('nom_riesgos');
                $revision->descripcion='Modificación de riesgo';
                $revision->usuario=$consultanom.' '.$consultapell;
                $revision-> save();
                 return REDIRECT ('/identificarriesgo')->with('Modificar','ok');
            

        }else{
            if( $existencia2 > 0){
                return back()->with('Error','error');
            }else{
                $riesg-> id_riesgos = $dato1.$consulta.'-'.$id;
                $riesg-> nom_riesgos = $request->nom_riesgos;
                $riesg-> id_categoria = $request->id_categoria;
                $riesg-> des_detalle = $request->detalle;
                $riesg-> id_proceso_afecta = $request->id_proceso_afecta;
                $riesg-> id_probabilidad = $request->id_probabilidad;
                $riesg-> id_impacto = $request->id_impacto;
                $riesg-> tot_calificacion = $request-> calificacion;
                $riesg-> num_pos_matriz = $val1.$val2;
                $riesg-> id_accion = $request->id_accion;
                $riesg-> ind_afecta_servicio = $request->ind_afecta_servicio;
                $riesg-> num_rto = $request-> rto;
                $riesg-> id_unidad_medida = $request->id_unidad_medida;
                $riesg-> tot_tolerancia = $request->tolerancia;
                $riesg-> tot_capacidad = $request->capacidad;
                $riesg-> ind_estado = $request->estado;
                $riesg-> usr_modifica = $consultausr;
                if(!is_null($request->file('inpArchivo')))
                {
                    $riesg-> nom_archivo = $request->file('inpArchivo')->store('public');
                }
              
                $riesg-> save();
                 
                $revision = new Revision();
                $revision-> codigo= $dato1.$consulta.'-'.$id;
                $revision->nombre=$request-> get('nom_riesgos');
                $revision->descripcion='Modificación de riesgo';
                $revision->usuario=$consultanom.' '.$consultapell;
                $revision-> save();
                 return REDIRECT ('/identificarriesgo')->with('Modificar','ok');
        }
   
    }
}

}
