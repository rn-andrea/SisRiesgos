<?php

namespace App\Http\Controllers;
use App\Models\Rol;

use Illuminate\Http\Request;

class RolController extends Controller
{
    
    public function index()
    {
        $rols = Rol::all();
        
        return view('mantenimientos.vwMantRoles',
        [ 
            'rols'=> $rols,
        ]);
    }

    public function show($id)
    {
       // return $id;
       $rols= Rol::all();
       $rol= Rol::findOrFail($id);
       return view('mantenimientos.vwMantRolesMod',[
        
        'rol'=>$rol,
        'rols'=>$rols,
       ]);

    }

    /*public function create()
    {
        return view('mantenimientos.vwMantRol');
    }*/

    public function store(Request $request)
    {
        $rol = new Rol();
        $rol-> ID= $request-> get('ID_ROL');
        $rol-> NOM_ROL = $request-> get('NOM_ROL');       		  
        $rol-> save();
        return Redirect('/MantRoles');
    }

    public function update(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);
       // $usuario-> ID_USUARIO = $request-> get;
        $rol-> NOM_ROL = $request->NOM_ROL;
        $rol-> updte_at;
        $rol-> save();
        
        return REDIRECT ('/MantRoles');
    }

}
