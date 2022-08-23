<?php

namespace App\Http\Controllers;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnidadMedidaController extends Controller
{
    
    public function index()
    {
        $UnidadMedidas = UnidadMedida::all();
        
        return view('mantenimientos.vwMantUnidadMedida',
        [ 
            'UnidadMedidas'=> $UnidadMedidas,
        ]);
    }

    public function create()
    {
       // return view('mantenimientos.vwMantUnidadMedida');
    }

    public function store(Request $request)
    {
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');

        $UnidadMedidas = new UnidadMedida();  
        $this->validate($request, [
           
            'nom_unidad_medida'=> 'required|max:50|min:3|unique:unidad_medidas|regex:/^[\pL\s\-]+$/u',
            'estado'=> 'required',
            'usuario_creador'=> 'required',
            'usuario_modificador'=> 'required',
            'observacion'=> 'max:200',
        ]);
        echo 'Ahora sé que los datos están validados. Puedo insertar en la base de datos';


        $UnidadMedidas-> id = $request-> get('id_unidad');
        $UnidadMedidas-> nom_unidad_medida = $request-> get('nom_unidad_medida');    			  
        $UnidadMedidas-> ind_estado = $request-> get('estado');
        $UnidadMedidas-> usr_creacion = $consultausr;
        $UnidadMedidas-> usr_modifica = $consultausr;
        $UnidadMedidas-> des_observacion = $request-> get('observacion');
        $UnidadMedidas-> save();
        return redirect('/MantUnidadMedida')->with('Agregar','ok');
    }

    
   
    public function show($id)
    {
        //return $id;
        $UnidadMedidas = UnidadMedida::all();
        $UnidadMedida= UnidadMedida::findOrFail($id);
        

       return view('mantenimientos.vwMantUnidadMedidaMod',[
        'UnidadMedidas'=> $UnidadMedidas,
        'UnidadMedida'=> $UnidadMedida,
       ]);

    }
    public function update(Request $request, $id)
    {
        $UnidadMedida = UnidadMedida::findOrFail($id);
      
        $this->validate($request, [
           
            'nom_unidad_medida'=> 'required|max:50|min:3',
            'estado'=> 'required',
            'usuario_creador'=> 'required',
            'usuario_modificador'=> 'required',
            'observacion'=> 'max:200',
        ]);
        echo 'Ahora sé que los datos están validados. Puedo insertar en la base de datos';

        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');

        $verificardato1= $request->nom_unidad_medida;
        $consulta = DB::table('unidad_medidas')->select('id')->where('nom_unidad_medida',$verificardato1)->where('id',$id);
        $existencia= $consulta->count();

        $consulta2 = DB::table('unidad_medidas')->select('id')->where('nom_unidad_medida',$verificardato1);
        $existencia2= $consulta2->count();

        if($existencia==1){

            $UnidadMedida-> nom_unidad_medida = $request-> get('nom_unidad_medida');    			  
            $UnidadMedida-> ind_estado = $request-> get('estado');
            $UnidadMedida-> usr_modifica = $consultausr;
            $UnidadMedida-> des_observacion = $request-> get('observacion');
            $UnidadMedida-> updated_at;
            $UnidadMedida-> save();

                return REDIRECT ('/MantUnidadMedida')->with('Modificar','ok');
            } else{
           
                $consulta2 = DB::table('unidad_medidas')->select('id')->where('nom_unidad_medida',$verificardato1);
                $existencia2= $consulta2->count();
                if($existencia2==1){
                    return back()->with('Error2','error');
                }else{
                    $UnidadMedida-> nom_unidad_medida = $request-> get('nom_unidad_medida');    			  
                    $UnidadMedida-> ind_estado = $request-> get('estado');
                    $UnidadMedida-> usr_modifica = $consultausr;
                    $UnidadMedida-> updated_at;
                    $UnidadMedida-> des_observacion = $request-> get('observacion');
                    $UnidadMedida-> save();
                    return redirect('/MantUnidadMedida')->with('Modificar','ok');

                }
            }
    }



}
