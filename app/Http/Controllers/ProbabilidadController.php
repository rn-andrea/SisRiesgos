<?php

namespace App\Http\Controllers;
use App\Models\Probabilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProbabilidadController extends Controller
{
    
    public function index()
    {
        $probabilidads = Probabilidad::all();
        
        return view('mantenimientos.vwMantProbabilidad',
        [ 
            'probabilidads'=> $probabilidads,
        ]);
    }

    public function create()
    {
       // return view('mantenimientos.vwMantProbabilidad',
    }

    public function store(Request $request)
    {
        return redirect('/MantProbabilidad')->with('Error','error');  
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');

        $Probabilidades= new Probabilidad();  
        $this->validate($request, [
           
            'nom_probabilidad'=> 'required|max:50|min:3|unique:probabilidads|regex:/^[\pL\s\-]+$/u',
            'estado'=> 'required',
            'observacion'=> 'max:200',
        ]);

        $Probabilidades-> nom_probabilidad = $request-> get('nom_probabilidad');
        $Probabilidades-> ind_estado = $request-> get('estado');
        $Probabilidades-> usr_creacion = $consultausr ;
        $Probabilidades-> usr_modifica = $consultausr ;
        $Probabilidades-> des_observacion = $request-> get('observacion');
        $Probabilidades-> save();
        return REDIRECT ('/MantProbabilidad')->with('Agregar','ok');
    }
    public function show($id)
    {
        //return $id;
        $probabilidads = Probabilidad::all();
        $probabilidad= Probabilidad::findOrFail($id);
        

       return view('mantenimientos.vwMantProbabilidadmod',[
        'probabilidads'=> $probabilidads,
        'probabilidad'=> $probabilidad,
       ]);

    }
    public function update(Request $request, $id)
    {
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
     
        $probabilidad = Probabilidad::findOrFail($id);
     
        $verificardato1= $request->nom_probabilidad;
        $verificardato2= $request->observacion;
        $verificardato3= DB::table('probabilidads')->select('ind_estado')->where('id',$id)->value('ind_estado');
        $verificardato4= $request->estado;

        $this->validate($request, [
           
            'nom_probabilidad'=> 'required|max:50|min:3',
            'estado'=> 'required',
            'observacion'=> 'max:200',
        ]);
        echo 'Ahora sé que los datos están validados. Puedo insertar en la base de datos';
    
        $consulta = DB::table('probabilidads')->select('id','nom_probabilidad','des_observacion','ind_estado')->where('nom_probabilidad',$verificardato1)->where('des_observacion',$verificardato2)->where('ind_estado',$verificardato3);
        $existencia= $consulta->count();
       
        if($existencia==1){
            if($verificardato3 == $verificardato4){
                return REDIRECT ('MantProbabilidad/')->with('Modifica','info');
            }else{
                $probabilidad-> nom_probabilidad = $request->nom_probabilidad;
                $probabilidad-> ind_estado = $request->estado ;
                $probabilidad-> des_observacion= $request->observacion;
                $probabilidad-> usr_modifica= $consultausr;
                $probabilidad-> updte_at;
                $probabilidad-> save();
                
                return REDIRECT ('/MantProbabilidad')->with('Modificar','ok');;
            }

        }else{
            $probabilidad-> nom_probabilidad = $request->nom_probabilidad;
            $probabilidad-> ind_estado = $request->estado ;
            $probabilidad-> des_observacion= $request->observacion;
            $probabilidad-> usr_modifica= $consultausr ;
            $probabilidad-> updte_at;
            $probabilidad-> save();
            
            return REDIRECT ('/MantProbabilidad')->with('Modificar','ok');
        }
       
    }

}
