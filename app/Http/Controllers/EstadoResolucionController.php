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
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');

        $EstadoResolcions= new EstadoResolucion ();  
        return redirect('/MantEstadosEvento')->with('Error','error');  
        $this->validate($request, [
           
            'nombre_estado_resolucion'=> 'required|max:50|min:3|unique:unidad_medidas',
            'estado'=> 'required',
            'usuario_creador'=> 'required',
            'usuario_modificador'=> 'required',
            'observacion'=> 'max:200',
        ]);
       

        $EstadoResolcions-> nom_estado_resolucion= $request-> get('nombre_estado_resolucion');
        $EstadoResolcions-> ind_estado = $request-> get('estado');
        $EstadoResolcions-> usr_creacion = $request-> get('usuario_creador');
        $EstadoResolcions-> usr_modifica = $request-> get('usuario_modificador');
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
        $estadoresolucion= EstadoResolucion::findOrFail($id);
        $this->validate($request, [
           
            'nombre_estado_resolucion'=> 'required|max:50|min:3|unique:unidad_medidas',
            'estado'=> 'required',
            'usuario_modificador'=> 'required',
            'observacion'=> 'max:200',
        ]);
        echo 'Ahora sé que los datos están validados. Puedo insertar en la base de datos';
    	
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');

        $estadoresolucion-> nom_estado_resolucion = $request->NOM_ESTADO_RESOLUCIOND;
        $estadoresolucion-> ind_estado = $request->IND_ESTADO ;
        $estadoresolucion-> des_observacion = $request->DES_OBSERVACION;
        $estadoresolucion-> usr_modifica= $request->USR_MODIFICA;
        $estadoresolucion-> updte_at;
        $estadoresolucion-> save();
        
        return REDIRECT ('MantEstadosEvento/');
    }

}
