<?php

namespace App\Http\Controllers;
use App\Models\Accion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccionController extends Controller
{
    
    public function index()
    {
        $Accions = Accion::all();
        
        return view('mantenimientos.vwMantAccionRiesgo',
        [ 
            'Accions'=> $Accions,
        ]);
    }

    public function create()
    {
        //return view('mantenimientos.vwMantAccionRiesgo'),
    }

    public function store(Request $request)
    {
       $correo = auth()->user()->email;
       $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');

        $Accions= new Accion(); 
        $this->validate($request, [
           
            'nombre_accion'=> 'required|max:50|min:3|unique:accions',
            'estado'=> 'required',
            'observacion'=> 'max:2000',
        ]);

        $Accions-> id = $request-> get('id'); 
        $Accions-> nombre_accion = $request-> get('nombre_accion');
        $Accions-> ind_estado = $request-> get('estado');
        $Accions-> usr_creacion = $consultausr;
        $Accions-> usr_modifica = $consultausr;
        $Accions-> des_observacion = $request-> get('observacion');
        $Accions-> save();
        return redirect('/MantAccion')->with('Agregar','ok');
    }
    public function show($id)
    {
        //return $id;
        $accions = Accion::all();
        $accion= Accion::findOrFail($id);
        

       return view('mantenimientos.vwMantAccionRiesgoMod',[
        'accions'=> $accions,
        'accion'=> $accion,
       ]);

    }
    public function update(Request $request, $id)
    {
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
       
        $action= Accion::findOrFail($id);
        $verificardato1= $request->nombre_accion;
        $verificardato2= $request->observacion;
        $verificardato3= DB::table('accions')->select('ind_estado')->where('id',$id)->value('ind_estado');
        $verificardato4= $request->estado;
        $this->validate($request, [
           
            'nombre_accion'=> 'required|max:50|min:3|',
            'estado'=> 'required',
            'observacion'=> 'max:2000',
        ]);

        $consulta = DB::table('accions')->select('id','nombre_accion','des_observacion','ind_estado')->where('nombre_accion',$verificardato1)->where('des_observacion',$verificardato2)->where('ind_estado',$verificardato3);
        $existencia= $consulta->count();

        if($existencia==1){
            if($verificardato3 == $verificardato4){
                return REDIRECT ('MantAccion/')->with('Modifica','info');
            }else{
                $action-> nombre_accion = $request->nombre_accion;
                $action-> ind_estado = $request->estado;
                $action-> des_observacion = $request->observacion;
                $action-> usr_modifica= $consultausr;
               
                $action-> save();
                
                return REDIRECT ('/MantAccion')->with('Modificar','ok');
            }

        }else{
            $action-> nombre_accion = $request->nombre_accion;
            $action-> ind_estado = $request->estado;
            $action-> des_observacion = $request->observacion;
            $action-> usr_modifica= $consultausr;
           
            $action-> save();
            
            return REDIRECT ('/MantAccion')->with('Modificar','ok');;
        }
      
    }

}
