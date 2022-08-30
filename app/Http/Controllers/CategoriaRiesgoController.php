<?php

namespace App\Http\Controllers;
use App\Models\CategoriaRiesgo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaRiesgoController extends Controller
{
    
    public function index()
    {
        $categoriariesgos = CategoriaRiesgo::all();
        
        return view('mantenimientos.vwMantCategRiesgo',
        [ 
            'categoriariesgos'=> $categoriariesgos,
        ]);
    }

    public function create()
    {
        //return view('mantenimientos.vwMantCategRiesgo');
    }

    public function store(Request $request)
    {
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
       
        $CategoriaRiesgo = new CategoriaRiesgo();      
        $this->validate($request, [
           
            'nombre_categoria'=> 'required|max:50|min:3|unique:categoria_riesgos',
            'estado'=> 'required',
            'observacion'=> 'max:2000',
        ]);
        $CategoriaRiesgo-> id = $request-> get('id');
        $CategoriaRiesgo-> nombre_categoria = $request-> get('nombre_categoria');
        $CategoriaRiesgo-> ind_estado = $request-> get('estado');
        $CategoriaRiesgo-> usr_creacion =$consultausr;
        $CategoriaRiesgo-> usr_modifica = $consultausr;
        $CategoriaRiesgo-> des_observacion = $request-> get('observacion');
        $CategoriaRiesgo-> save();
        return redirect('/MantCategoria')->with('Agregar','ok');
    }

    public function show($id)
    {
        //return $id;
        $categoriariesgos = CategoriaRiesgo::all();
        $CategoriaRiesgo= CategoriaRiesgo::findOrFail($id);
        

       return view('mantenimientos.vwMantCategRiesgoMod',[
        'categoriariesgos'=> $categoriariesgos,
        'CategoriaRiesgo'=> $CategoriaRiesgo,
       ]);

    }
    public function update(Request $request, $id)
    {
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
       
        $CategoriaRiesgo = CategoriaRiesgo::findOrFail($id);
        $verificardato1= $request->nombre_categoria;
        $verificardato2= $request->observacion;
        $verificardato3= DB::table('categoria_riesgos')->select('ind_estado')->where('id',$id)->value('ind_estado');
        $verificardato4= $request->estado;

        $this->validate($request, [
           
            'nombre_categoria'=> 'required|max:50|min:3',
            'estado'=> 'required',
            'observacion'=> 'max:2000',
        ]);

        $consulta = DB::table('categoria_riesgos')->select('id','nombre_categoria','des_observacion','ind_estado')->where('nombre_categoria',$verificardato1)->where('des_observacion',$verificardato2)->where('ind_estado',$verificardato3);
        $existencia= $consulta->count();

        if($existencia==1){
            if($verificardato3 == $verificardato4){
                return REDIRECT ('MantCategoria/')->with('Modifica','info');
            }else{
                $CategoriaRiesgo-> nombre_categoria = $request->nombre_categoria;
                $CategoriaRiesgo-> ind_estado = $request->estado;
                $CategoriaRiesgo-> des_observacion = $request->observacion;
                $CategoriaRiesgo-> usr_modifica =  $consultausr;
         
                $CategoriaRiesgo-> save();
                 
                 return REDIRECT ('/MantCategoria')->with('Modificar','ok');
            }

        }else{
            $CategoriaRiesgo-> nombre_categoria = $request->nombre_categoria;
            $CategoriaRiesgo-> ind_estado = $request->estado;
            $CategoriaRiesgo-> des_observacion = $request->observacion;
            $CategoriaRiesgo-> usr_modifica =  $consultausr;
     
            $CategoriaRiesgo-> save();
             
             return REDIRECT ('/MantCategoria')->with('Modificar','ok');
        }
   
    }

}
