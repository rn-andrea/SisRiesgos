<?php

namespace App\Http\Controllers;
use App\Models\EstadoResolucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadoResolucionController extends Controller
{
    
    public function index()
    {
        $estadoresolucions= EstadoResolucion::all();
        
        return view('mantenimientos.vwMantEstadosEvento',
        [ 
            'estadoresolucions'=> $estadoresolucions,
        ]);
    }

    public function create()
    {
       
    }

    public function store(Request $request)
    {
        return redirect('/MantEstadosEvento')->with('Error','error');  
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');

        $EstadoResolcions= new EstadoResolucion ();  
      
        $this->validate($request, [
           
            'nom_estado_resolucion'=> 'required|max:50|min:3|unique:estado_resolucions|regex:/^[\pL\s\-]+$/u',
            'estado'=> 'required',
            'observacion'=> 'max:200',
        ]);
       

        $EstadoResolcions-> nom_estado_resolucion= $request-> get('nom_estado_resolucion');
        $EstadoResolcions-> ind_estado = $request-> get('estado');
        $EstadoResolcions-> usr_creacion = $consultausr;
        $EstadoResolcions-> usr_modifica = $consultausr;
        $EstadoResolcions-> des_observacion = $request-> get('observacion');
        $EstadoResolcions-> save();
       
    }
    public function show($id)
    {
        //return $id;
        $estadoresolucions = EstadoResolucion::all();
        $estadoresolucion= EstadoResolucion::findOrFail($id);
        

       return view('mantenimientos.vwMantEstadosEventoMod',[
        'estadoresolucions'=>  $estadoresolucions,
        'estadoresolucion'=>  $estadoresolucion,
       ]);

    }
    public function update(Request $request, $id)
    {
       $correo = auth()->user()->email;
       $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
       
        $verificardato1= $request->nom_estado_resolucion;
        $verificardato2= $request->des_observacion;
        $verificardato4= $request->estado;
        $verificardato3= DB::table('estado_resolucions')->select('ind_estado')->where('id',$id)->value('ind_estado');
        $estadoresolucion= EstadoResolucion::findOrFail($id);
        $this->validate($request, [
           
            'nom_estado_resolucion'=> 'required|max:50|min:3',
            'estado'=> 'required',
            'des_observacion'=> 'max:200',
        ]);
        echo 'Ahora sé que los datos están validados. Puedo insertar en la base de datos';
    	
        $consulta = DB::table('estado_resolucions')->select('id','des_observacion','ind_estado')->where('nom_estado_resolucion',$verificardato1)->where('des_observacion',$verificardato2)->where('ind_estado',$verificardato3);
        $existencia= $consulta->count();

        if($existencia==1){
            if($verificardato3 == $verificardato4){
                return REDIRECT ('MantEstadosEvento/')->with('Modifica','info');
            }else {
                $estadoresolucion-> nom_estado_resolucion = $request->nom_estado_resolucion;
                $estadoresolucion-> ind_estado = $request->estado;
                $estadoresolucion-> des_observacion = $request->des_observacion;
                $estadoresolucion-> usr_modifica= $consultausr;
                $estadoresolucion-> updte_at;
                $estadoresolucion-> save();
                return REDIRECT ('MantEstadosEvento/')->with('Modificar','ok');
       
            }
          

        }
        else{
          
                $estadoresolucion-> nom_estado_resolucion = $request->nom_estado_resolucion;
                $estadoresolucion-> ind_estado = $request->estado;
                $estadoresolucion-> des_observacion = $request->des_observacion;
                $estadoresolucion-> usr_modifica= $consultausr;
                $estadoresolucion-> updte_at;
                $estadoresolucion-> save();
                return REDIRECT ('MantEstadosEvento/')->with('Modificar','ok');
            
            
            
        }

       
    }

}
