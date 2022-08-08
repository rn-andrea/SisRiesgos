<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\ProcesoAfecta;
use App\Models\ResponsableProcesoAfecta;
use Illuminate\Support\Facades\Log;

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
    
        $responsablesproceso-> id = $request-> get('ID');
        $responsablesproceso-> usr_responsable_proceso = $request-> get('ID_RESPONSABLE');
        $responsablesproceso-> id_proceso_afecta = $request-> get('ID_PROCESO_AFECTA');
        $responsablesproceso-> usr_creacion = $request-> get('USR_CREACION');
        $responsablesproceso-> usr_modifica = $request-> get('USR_MODIFICA');
        $responsablesproceso-> save();
        
        return REDIRECT ('MantResponsablesProcesoAfecta/');
        
    }

    public function show($ID_USUARIO)
    {
        //return $id;
        $usuarios = Usuario::all();
        $usuario= Usuario::findOrFail($ID_USUARIO);
        $rols= Rol::all();

       return view('mantenimientos.vwMantUsuarios',[
        'usuario'=> $usuario,
        'rols'=>$rols,
        'usuarios'=> $usuarios,
       ]);

    }

    public function update(Request $request, $ID_USUARIO)
    {
        $usuario = Usuario::findOrFail($ID_USUARIO);
        //$usuario-> ID_USUARIO = $request-> get;
        $usuario-> id_usuario = $request-> ID_USUARIO;
        $usuario-> usr_nombre = $request->USR_NOMBRE;
        $usuario-> usr_apellidos = $request-> USR_APELLIDOS;
        $usuario-> usr_email = $request-> USR_EMAIL;
        $usuario-> usr_password = $request->USR_PASSWORD;
        $usuario-> ind_estado = $request->IND_ESTADO;
        $usuario-> id_rol = $request-> ID_ROL;
        $usuario-> save();
        
        return REDIRECT ('/MantUsuarios');
    }


    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        
        $usuario-> deleted();
       // return REDIRECT ('/MantUsuarios');
    }
}
