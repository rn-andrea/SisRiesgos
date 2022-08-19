<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\ProcesoAfecta;
use App\Models\ResponsableProcesoAfecta;
use App\Models\Estado;
use Illuminate\Support\Facades\DB;

class ResponsableProcesoAfectaController extends Controller
{
    public function index()
    {

        $usuarios = Usuario::all();
        $procesoafectas = ProcesoAfecta::all();
        $responsablesproceso = ResponsableProcesoAfecta::select('id','usr_responsable_proceso','id_proceso_afecta','usr_creacion','usr_modifica','ind_estado','created_at','updated_at')->orderBy('updated_at','DESC')->get();
        $usuariorespon = Usuario::select('id','id_usuario','usr_nombre','usr_apellidos')->where('ind_estado','1')->get();
        $procesoafecta = ProcesoAfecta::select('id','id_nomenclatura','nom_proceso_afecta')->where('ind_estado','1')->get();

        return view('mantenimientos.vwMantResponsablesPorProceso',[
            'usuarios'=> $usuarios,
            'procesoafectas'=> $procesoafectas,
            'usuariorespon'=>$usuariorespon,
            'procesoafecta'=>$procesoafecta,
            'responsablesproceso'=>$responsablesproceso,
        ]);


    }
  

    public function create()
    {
       // return view('create');
       // return view('mantenimientos.create');
    }

    public function store(Request $request)
    {
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
       
        //Log::debug('Ingresa a funcion store');
        $responsablesproceso = new ResponsableProcesoAfecta();
    
        $verificardato1= $request->ID_RESPONSABLE;
        $verificardato2= $request->ID_PROCESO_AFECTA;

       
        $consulta = DB::table('responsable_proceso_afectas')->select('id')->where('usr_responsable_proceso',$verificardato1)->where('id_proceso_afecta',$verificardato2);
        $existencia= $consulta->count();
        
        if($existencia<1){
            $responsablesproceso-> id = $request-> get('ID');
            $responsablesproceso-> usr_responsable_proceso = $request-> get('ID_RESPONSABLE');
            $responsablesproceso-> id_proceso_afecta = $request-> get('ID_PROCESO_AFECTA');
            $responsablesproceso-> ind_estado = $request-> get('IND_ESTADO');
            $responsablesproceso-> usr_creacion = $consultausr;
            $responsablesproceso-> usr_modifica = $consultausr;
            $responsablesproceso-> save();
            
            
           return REDIRECT ('MantResponsablesProcesoAfecta/')->with('Agregar','ok');
        }else{
            
            return REDIRECT ('MantResponsablesProcesoAfecta/')->with('Error','error');
                //return REDIRECT ('MantResponsablesProcesoAfecta/?error=error1');
             
        }
       
        
    }

    public function show($id)
    {
        $responsablesprocesos =ResponsableProcesoAfecta::select('id','usr_responsable_proceso','id_proceso_afecta','usr_creacion','usr_modifica','ind_estado','created_at','updated_at')->orderBy('updated_at','DESC')->get();
        $responsablesproceso= ResponsableProcesoAfecta::findOrFail($id);
        $condicion=ResponsableProcesoAfecta::where('id',$id)->select('id_proceso_afecta')->value('id_proceso_afecta');
        $condicion2=ResponsableProcesoAfecta::where('id',$id)->select('usr_responsable_proceso')->value('usr_responsable_proceso');
        $usuariorespon = Usuario::select('id','id_usuario','usr_nombre','usr_apellidos')->where('id_usuario','!=',$condicion2)->where('ind_estado','1')->get();
        $procesoafectaf = ProcesoAfecta::select('id','id_nomenclatura','nom_proceso_afecta')->where('id','!=',$condicion)-> where('ind_estado','1')->get();

       return view('mantenimientos.vwMantResponsablesPorProcesoMod',[
        'responsablesprocesos'=> $responsablesprocesos,
        'responsablesproceso'=>$responsablesproceso,
        'usuariorespon'=>$usuariorespon,
        'procesoafectaf'=>$procesoafectaf,
        'condicion'=>$condicion,
        
       ]);

    }


    public function update(Request $request, $id)
    {
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
       
        $responsablesproceso= ResponsableProcesoAfecta::findOrFail($id);
        $verificardato1= $request->ID_RESPONSABLE;
        $verificardato2= $request->ID_PROCESO_AFECTA;
        $verificardato3=ResponsableProcesoAfecta::where('id',$id)->select('ind_estado')->value('ind_estado');
        

        $consulta = DB::table('responsable_proceso_afectas')->select('id')->where('usr_responsable_proceso',$verificardato1)->where('id_proceso_afecta',$verificardato2)->where('id',$id)->where('ind_estado',$verificardato3)->get();
        $existencia= $consulta->count();
        
        if($existencia==1){
        
            $responsablesproceso-> usr_responsable_proceso = $request->ID_RESPONSABLE;
            $responsablesproceso-> id_proceso_afecta = $request-> ID_PROCESO_AFECTA;
            $responsablesproceso-> usr_modifica =  $consultausr;
            $responsablesproceso-> ind_estado = $request->IND_ESTADO;
            $responsablesproceso-> updte_at;
            $responsablesproceso-> save();
            return REDIRECT ('MantResponsablesProcesoAfecta/')->with('Modificar','ok');
   
      
     }else{
            
        $consulta2 = DB::table('responsable_proceso_afectas')->select('id')->where('usr_responsable_proceso',$verificardato1)->where('id_proceso_afecta',$verificardato2);
        $existencia2= $consulta2->count();
        if($existencia2<1){
            $responsablesproceso-> usr_responsable_proceso = $request->ID_RESPONSABLE;
            $responsablesproceso-> id_proceso_afecta = $request-> ID_PROCESO_AFECTA;
            $responsablesproceso-> usr_modifica =  $consultausr;
            $responsablesproceso-> ind_estado = $request->IND_ESTADO;
            $responsablesproceso-> updte_at;
            $responsablesproceso-> save();
            
            
           
            return REDIRECT ('MantResponsablesProcesoAfecta/')->with('Modificar','ok');;
        }else{
            
                return back()->with('Error2','error');;
              
        }
      
     }
    }


    public function destroy($id)
    {
        $responsablesproceso= ResponsableProcesoAfecta::findOrFail($id);
        
        $responsablesproceso-> deleted();
       
    }
}
