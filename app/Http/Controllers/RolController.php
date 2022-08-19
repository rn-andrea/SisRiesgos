<?php

namespace App\Http\Controllers;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RolController extends Controller
{
    
    public function index()
    {
        $rols = Rol::select('id','nombre_rol','created_at','updated_at','ind_estado')->orderBy('id','ASC')->get();
        
        return view('mantenimientos.vwMantRoles',
        [ 
            'rols'=> $rols,
        ]);
    }

    public function show($id)
    {
       // return $id;
       $rols = Rol::select('id','nombre_rol','created_at','updated_at','ind_estado')->orderBy('id','ASC')->get();
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
        $this->validate($request, [
           
            'nombre_rol'=> 'required|max:50|min:3|unique:rols|regex:/^[0-9\s\pL\-]+$/u',
        ]);
        echo 'Ahora sé que los datos están validados. Puedo insertar en la base de datos';

        $verificardato1= $request->NOM_ROL;
        $consulta = DB::table('rols')->select('id')->where('nombre_rol',$verificardato1);
        $existencia= $consulta->count();

        if($existencia<1){
           
            $rol-> id= $request-> get('ID_ROL');
            $rol-> nombre_rol = $request-> get('nombre_rol');   
            $rol->ind_estado = $request-> get('IND_ESTADO');   		  
            $rol-> save();
            return REDIRECT ('/MantRoles')->with('Agregar','ok');
        }else{
            
            return REDIRECT ('/MantRoles')->with('Error','error');
               
             
        }
    }

    public function update(Request $request, $id)
    {
        $rol = Rol::findOrFail($id);

        $this->validate($request, [
           
            'nombre_rol'=> 'required|max:50|regex:/^[0-9\s\pL\-]+$/u'
        ]);
        echo 'Ahora sé que los datos están validados. Puedo insertar en la base de datos';
        
        $verificardato1= $request->nombre_rol;
        $consulta = DB::table('rols')->select('id')->where('nombre_rol',$verificardato1)->where('id',$id);
        $existencia= $consulta->count();

        $consulta2 = DB::table('rols')->select('id')->where('nombre_rol',$verificardato1);
        $existencia2= $consulta2->count();

        if($existencia==1){

           
            $rol-> nombre_rol = $request-> nombre_rol; 
            $rol->ind_estado = $request-> IND_ESTADO;   	
            $rol-> updte_at;
            $rol-> save();
            
            return REDIRECT ('/MantRoles')->with('Modificar','ok');
         } else{
           
           
            if($existencia2==1){
                return back()->with('Error2','error');
            }else{
               
                $rol-> nombre_rol = $request-> nombre_rol; 
                $rol->ind_estado = $request-> IND_ESTADO;   	
                $rol-> updte_at;
                $rol-> save();
                return REDIRECT ('/MantRoles')->with('Modificar','ok');

            }
        }
    }

}
