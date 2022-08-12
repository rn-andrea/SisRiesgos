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
        $responsablesproceso = ResponsableProcesoAfecta::all();
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
            $responsablesproceso-> usr_creacion = $request-> get('USR_CREACION');
            $responsablesproceso-> usr_modifica = $request-> get('USR_MODIFICA');
            $responsablesproceso-> save();
            
            
            return REDIRECT ('MantResponsablesProcesoAfecta/');
        }else{
            
                return REDIRECT ('MantResponsablesProcesoAfecta/?error=error1');
                return REDIRECT ('MantResponsablesProcesoAfecta/');
        }
       
        
    }

    public function show($id)
    {
        //return $id;
        $responsablesprocesos = ResponsableProcesoAfecta::all();
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
        $responsablesproceso= ResponsableProcesoAfecta::findOrFail($id);
        $verificardato1= $request->ID_RESPONSABLE;
        $verificardato2= $request->ID_PROCESO_AFECTA;
        $verificardato3= DB::table('responsable_proceso_afectas')->select('ind_estado')->where('id',$id)->get();

        $consulta = DB::table('responsable_proceso_afectas')->select('id')->where('usr_responsable_proceso',$verificardato1)->where('id_proceso_afecta',$verificardato2)->where('id',$id)->get();
        $existencia= $consulta->count();
        
        if($existencia==1){
        
            $responsablesproceso-> usr_responsable_proceso = $request->ID_RESPONSABLE;
            $responsablesproceso-> id_proceso_afecta = $request-> ID_PROCESO_AFECTA;
            $responsablesproceso-> usr_modifica = $request->USR_MODIFICA;
            $responsablesproceso-> ind_estado = $request->IND_ESTADO;
            $responsablesproceso-> updte_at;
            $responsablesproceso-> save();
            return REDIRECT ('/MantResponsablesProcesoAfecta/?error=error2');
      
     }else{
            
        $consulta2 = DB::table('responsable_proceso_afectas')->select('id')->where('usr_responsable_proceso',$verificardato1)->where('id_proceso_afecta',$verificardato2);
        $existencia2= $consulta2->count();
        if($existencia2<1){
            $responsablesproceso-> usr_responsable_proceso = $request->ID_RESPONSABLE;
            $responsablesproceso-> id_proceso_afecta = $request-> ID_PROCESO_AFECTA;
            $responsablesproceso-> usr_modifica = $request->USR_MODIFICA;
            $responsablesproceso-> ind_estado = $request->IND_ESTADO;
            $responsablesproceso-> updte_at;
            $responsablesproceso-> save();
            
            
           
            return REDIRECT ('/MantResponsablesProcesoAfecta/?error=error2');
        }else{
            
                return REDIRECT ('MantResponsablesProcesoAfecta/?error=error1');
              
        }
      
     }
    }


    public function destroy($id)
    {
        $responsablesproceso= ResponsableProcesoAfecta::findOrFail($id);
        
        $responsablesproceso-> deleted();
       
    }
}
