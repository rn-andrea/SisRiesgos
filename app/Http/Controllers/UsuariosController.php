<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Support\Facades\Log;

class UsuariosController extends Controller
{
    public function index()
    {

        $usuarios = Usuario::all();
        $rols= Rol::all();
        $rolr = Rol::select('id','nom_rol')->where('ind_estado','1')->get();
 

        return view('mantenimientos.create',[
            'usuarios'=> $usuarios,
            'rols'=>$rols,
            'rolr'=>$rolr,
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
       
        $usuario = new Usuario();
        $usuario-> id = $request-> get('ID');
        $usuario-> id_usuario = $request-> get('ID_USUARIO');
        $usuario-> usr_nombre = $request-> get('USR_NOMBRE');
        $usuario-> usr_apellidos = $request-> get('USR_APELLIDOS');
        $usuario-> usr_email = $request-> get('USR_EMAIL');
        $usuario-> usr_password = $request-> get('USR_PASSWORD');
        $usuario-> ind_estado = $request-> get('IND_ESTADO');
        $usuario-> id_rol = $request-> get('ID_ROL');
        $usuario-> save();
        
        return REDIRECT ('/MantUsuarios');
        
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
