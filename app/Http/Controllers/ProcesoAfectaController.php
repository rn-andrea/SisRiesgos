<?php

namespace App\Http\Controllers;
use App\Models\ProcesoAfecta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcesoAfectaController extends Controller
{
    
    public function index()
    {
        $ProcesoAfectas = ProcesoAfecta::all();
        
        return view('mantenimientos.vwMantProcesoAfecta',
        [ 
            'ProcesoAfectas'=> $ProcesoAfectas,
        ]);
    }

    public function create()
    {
        //return view('mantenimientos.vwMantProcesoAfecta');
    }

    public function store(Request $request)
    {
        $correo = auth()->user()->email;
        $consulta = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
        $ProcesoAfectas= new ProcesoAfecta();  
        $this->validate($request, [
            'id_nomenclatura'=> 'required|max:3|min:3|unique:proceso_afectas|regex:/^[\pL\-]+$/u',
            'nombre_proceso_afecta'=> 'required|max:50|min:3|regex:/^[\pL\s\-]+$/u',
            'estado'=> 'required',
            'observacion'=> 'max:200',
    
        ]);
        echo 'Ahora sé que los datos están validados. Puedo insertar en la base de datos';

      
              	
        $ProcesoAfectas-> id = $request-> get('id');		
        $ProcesoAfectas-> id_nomenclatura= $request-> get('id_nomenclatura');
	    $ProcesoAfectas-> nom_proceso_afecta = $request-> get('nombre_proceso_afecta');
        $ProcesoAfectas-> ind_estado = $request-> get('estado');
        $ProcesoAfectas-> usr_creacion= $consulta;
        $ProcesoAfectas-> usr_modifica= $consulta;
        $ProcesoAfectas-> des_observacion = $request-> get('observacion');
        $ProcesoAfectas-> save();
        return redirect('/MantProcesoAfecta')->with('Agregar','ok');
        
    }

    public function show($id)
    {
        //return $id;
        $ProcesoAfectas = ProcesoAfecta::all();
        $ProcesoAfecta = ProcesoAfecta::findOrFail($id);
        

       return view('mantenimientos.vwMantProcesoAfectaMod',[
        'ProcesoAfectas'=> $ProcesoAfectas,
        'ProcesoAfecta'=> $ProcesoAfecta,
       ]);

    }
    public function update(Request $request, $id)
    {
        $correo = auth()->user()->email;
        $consultausr = DB::table('usuarios')->select('ID_USUARIO')->where('USR_EMAIL',$correo)->value('ID_USUARIO');
        $ProcesoAfecta= ProcesoAfecta::findOrFail($id);
     

        $this->validate($request, [
            'id_nomenclatura'=> 'required|max:3|min:3|regex:/^[\pL\-]+$/u',
            'nombre_proceso_afecta'=> 'required|max:50|min:3|regex:/^[\pL\s\-]+$/u',
            'estado'=> 'required',
            'observacion'=> 'max:200',
    
        ]);
        

        $verificardato1= $request->id_nomenclatura;
        $consulta = DB::table('proceso_afectas')->select('id')->where('id_nomenclatura',$verificardato1)->where('id',$id)->get();
        $existencia= $consulta->count();


        if($existencia==1){
          
            $ProcesoAfecta-> id_nomenclatura = $request->id_nomenclatura;
            $ProcesoAfecta-> nom_proceso_afecta = $request->nombre_proceso_afecta;
            $ProcesoAfecta-> ind_estado = $request->estado;
            $ProcesoAfecta-> des_observacion= $request->observacion;
            $ProcesoAfecta-> usr_modifica= $consultausr;
            $ProcesoAfecta-> updated_at;
            $ProcesoAfecta-> save();
            
            return REDIRECT ('/MantProcesoAfecta')->with('Modificar','ok');
        } else{
            $consulta2 = DB::table('proceso_afectas')->select('id')->where('id_nomenclatura',$verificardato1)->get();
            $existencia2= $consulta2->count();
            //return $existencia2;

            if($existencia2<1){

                $ProcesoAfecta-> id_nomenclatura = $request->id_nomenclatura;
                $ProcesoAfecta-> nom_proceso_afecta = $request->nombre_proceso_afecta;
                $ProcesoAfecta-> ind_estado = $request->estado;
                $ProcesoAfecta-> des_observacion= $request->observacion;
                $ProcesoAfecta-> usr_modifica=  $consultausr;
                $ProcesoAfecta-> updated_at;
                $ProcesoAfecta-> save();
                return REDIRECT ('/MantProcesoAfecta')->with('Modificar','ok');
                
                
            }else{
                
                return back()->with('Error2','error');
                  
            }
        }
    }
}
