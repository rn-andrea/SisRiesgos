<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function index()
    {

        $usuarios = Usuario::select('id','id_usuario','usr_nombre','usr_apellidos','usr_email','usr_password','ind_estado','id_rol','created_at','updated_at')->orderBy('updated_at','DESC')->get();
        
        $rols= Rol::all();
        $rolr = Rol::select('id','nombre_rol')->where('ind_estado','1')->get();
 

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
        
        $usuario = new Usuario();
        $verificarid= $request->idusuario;
        $usuarios = Usuario::select('id','id_usuarios')->where('id_usuario',$verificarid);
        //Log::debug('Ingresa a funcion store');
        $this->validate($request, [
            'id_usuario'=> 'required|max:10|min:3|unique:usuarios|regex:/^[0-9\pL\-]+$/u',
            'nombre'=> 'required|max:25|min:3|regex:/^[\pL\s\-]+$/u',
            'apellidos'=> 'required|max:50|min:3|regex:/^[\pL\s\-]+$/u',
            'correo'=> 'required|max:50|email|',
            'contraseña'=> 'required|max:25|min:8',
            'estado'=> 'required',
            'rol'=> 'required',
    
        ]);
        echo 'Ahora sé que los datos están validados. Puedo insertar en la base de datos';

      
       
       
        $usuario-> id = $request-> get('id');
        $usuario-> id_usuario = $request-> get('id_usuario');
        $usuario-> usr_nombre = $request-> get('nombre');
        $usuario-> usr_apellidos = $request-> get('apellidos');
        $usuario-> usr_email = $request-> get('correo');
        $usuario-> usr_password = $request-> get('contraseña');
        $usuario-> ind_estado = $request-> get('estado');
        $usuario-> id_rol = $request-> get('rol');
        $usuario-> save();
        
        return REDIRECT ('/MantUsuarios')->with('Agregar','ok');;
        
    }

    public function show($ID_USUARIO)
    {
        //return $id;
        $condicion= Usuario::where('id',$ID_USUARIO)->select('id_rol')->value('id_rol');
        $usuarios = Usuario::select('id','id_usuario','usr_nombre','usr_apellidos','usr_email','usr_password','ind_estado','id_rol','created_at','updated_at')->orderBy('updated_at','DESC')->get();
        $usuario= Usuario::findOrFail($ID_USUARIO);
        $rols= Rol::select('id','nombre_rol')->where('id','!=',$condicion)-> where('ind_estado','1')->get();

       return view('mantenimientos.vwMantUsuarios',[
        'usuario'=> $usuario,
        'rols'=>$rols,
        'usuarios'=> $usuarios,
       ]);

    }

    public function update(Request $request, $ID_USUARIO)
    {
        $usuario = Usuario::findOrFail($ID_USUARIO);
     
        $this->validate($request, [
            
            'nombre'=> 'required|max:25|min:3|regex:/^[\pL\s\-]+$/u',
            'apellidos'=> 'required|max:50|min:3|regex:/^[\pL\s\-]+$/u',
            'correo'=> 'required|max:50|email',
            'contraseña'=> 'required|max:25|min:8',
            'estado'=> 'required',
            'rol'=> 'required',
    
        ]);
        echo 'Ahora sé que los datos están validados. Puedo insertar en la base de datos';

  
        $usuario-> usr_nombre = $request->nombre;
        $usuario-> usr_apellidos = $request-> apellidos;
        $usuario-> usr_email = $request-> correo;
        $usuario-> usr_password = $request->contraseña;
        $usuario-> ind_estado = $request->estado;
        $usuario-> id_rol = $request-> rol;
        $usuario-> save();
        
        return REDIRECT ('/MantUsuarios')->with('Modificar','ok');;
    }


    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        
        $usuario-> deleted();
       // return REDIRECT ('/MantUsuarios');
    }
}
