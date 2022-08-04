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
        return view('mantenimientos.create',[
            'usuarios'=> $usuarios,
            'rols'=>$rols,
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
        $usuario-> ID_USUARIO = $request-> get('ID_USUARIO');
        $usuario-> USR_NOMBRE = $request-> get('USR_NOMBRE');
        $usuario-> USR_APELLIDOS = $request-> get('USR_APELLIDOS');
        $usuario-> USR_EMAIL = $request-> get('USR_EMAIL');
        $usuario-> USR_PASSWORD = $request-> get('USR_PASSWORD');
        $usuario-> IND_ESTADO = $request-> get('IND_ESTADO');
        $usuario-> ID_ROL = $request-> get('ID_ROL');
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
        $usuario-> USR_NOMBRE = $request->USR_NOMBRE;
        $usuario-> USR_APELLIDOS = $request-> USR_APELLIDOS;
        $usuario-> USR_EMAIL = $request-> USR_EMAIL;
        $usuario-> USR_PASSWORD = $request->USR_PASSWORD;
        $usuario-> IND_ESTADO = $request->IND_ESTADO;
        $usuario-> ID_ROL = $request-> ID_ROL;
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
