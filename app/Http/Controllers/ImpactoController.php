<?php

namespace App\Http\Controllers;

use App\Models\Impacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImpactoController extends Controller
{
    
    public function index()
    {
        $impactos = Impacto::all();
        
        return view('mantenimientos.vwMantImpacto',
        [ 
            'impactos'=> $impactos,
        ]);
    }

    public function create()
    {
       // return view('mantenimientos.vwMantImpacto');
    }

    public function store(Request $request)
    {
        return redirect('/MantImpacto')->with('Error','error');  
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');

        $Impacto= new Impacto();   

        $this->validate($request, [
           
            'nom_impacto'=> 'required|max:50|min:3|unique:impactos',
            'estado'=> 'required',
            'observacion'=> 'max:2000',
        ]);

      		  
	    $Impacto-> nom_impacto = $request-> get('nom_impacto');
        $Impacto-> ind_estado = $request-> get('estado');
        $Impacto-> usr_creacion = $consultausr;
        $Impacto-> usr_modifica = $consultausr;
        $Impacto-> des_observacion = $request-> get('observacion');
        $Impacto-> save();
        return REDIRECT ('/MantImpacto')->with('Agregar','ok');
    }
    public function show($id)
    {
        //return $id;
        $impactos = Impacto::all();
        $impacto= Impacto::findOrFail($id);
        

       return view('mantenimientos.vwMantImpactoMod',[
        'impactos'=> $impactos,
        'impacto'=> $impacto,
       ]);

    }
    public function update(Request $request, $id)
    {
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
        $impacto = Impacto::findOrFail($id);
        $verificardato1= $request->nom_impacto;
        $verificardato2= $request->observacion;
        $verificardato3= DB::table('impactos')->select('ind_estado')->where('id',$id)->value('ind_estado');
        $verificardato4= $request->estado;
        $this->validate($request, [
           
            
            'nom_impacto'=> 'required|max:50|min:3|regex:/^[\pL\s\-]+$/u',
            'estado'=> 'required',
            'observacion'=> 'max:2000',
        ]);
        echo 'Ahora sé que los datos están validados. Puedo insertar en la base de datos';
    
        $consulta = DB::table('impactos')->select('id','nom_impacto','des_observacion','ind_estado')->where('nom_impacto',$verificardato1)->where('des_observacion',$verificardato2)->where('ind_estado',$verificardato3);
        $existencia= $consulta->count();
       
        if($existencia==1){
           
            if($verificardato3 == $verificardato4){
                return REDIRECT ('MantImpacto/')->with('Modifica','info');
            }else  {
                $impacto-> nom_impacto = $request->nom_impacto;
                $impacto-> ind_estado = $request->estado;
                $impacto-> des_observacion = $request->observacion;
                $impacto-> usr_modifica = $consultausr;
                $impacto-> updte_at;
                $impacto-> save();
                
                return REDIRECT ('/MantImpacto')->with('Modificar','ok');
            }
        }else{
            $impacto-> nom_impacto = $request->nom_impacto;
            $impacto-> ind_estado = $request->estado;
            $impacto-> des_observacion = $request->observacion;
            $impacto-> usr_modifica = $consultausr;
            
            $impacto-> save();
            return REDIRECT ('/MantImpacto')->with('Modificar','ok');
        }
        
        
    
    }

}
