@extends('vwMainTemplate')
@section('contenido')
<html>
</br>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="container-fluid px-4">
    <h1 class="mt-4">Modificar Responsables por Proceso que Afecta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
     <form action="/MantResponsablesProcesoAfecta/store" method="POST">
		@csrf
            <div class="row">
                <div class="col-sm">
                <label for="selectProceso">Proceso que Afecta</label>
                <select id="selectProceso" class="form-control" name="ID_PROCESO_AFECTA" >

                   @foreach ($procesoafecta as $proceso)
                        
                        <option value="{{$proceso['id']}}">{{$proceso['nom_proceso_afecta']}}</option>
                   @endforeach
                </select>

            </div>

          </div>
        </br>
           <div class="row">
                <div class="col-sm">
                <label for="selectRresponsable">Asignar Responsable</label>
                <select id="selectResponsable" class="form-control" name="ID_RESPONSABLE" >
                   @foreach ($usuariorespon as $usuario)
                        <option value="{{$usuario['id_usuario']}}">{{$usuario['id_usuario']}} {{$usuario['usr_nombre']}} {{$usuario['usr_apellidos']}}</option>
                   @endforeach
                </select>
                </div>
            </div>
        </br>
        <div class="row">
                <div class="col-sm">
				<input class="form-check-input" type="hidden" value="2" name="IND_ESTADO" >
                <input class="form-check-input" type="checkbox" value="1" name="IND_ESTADO" id="defaultCheck3" checked>
                    <label class="form-check-label" for="Activo">
                        Estado Activo
                    </label>
                   
        </div>
            <div class="col-sm">
            <input type="hidden" class="form-control" id="txtUSRCREACION"  name="USR_CREACION" value="305050002"> 
            </div>
            <div class="col-sm">
            <input type="hidden" class="form-control" id="txtUSRMODIFICA"  name="USR_MODIFICA" value="305050002">
           


            </div>
    
    </br>
        </br>
            <div class="row">
            <div class="col-sm" ></div>
                <div class="col-sm">
                    <button type="submit" onClientClick="return confirmInsert(this)" class="btn btn-primary my-1">Registrar Responsable</button>
                </div>    
                <div class="col-sm"></div>
            </div>
        
    </form>
    </br>
    
    <div class="row">
    <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Proceso que Afecta</th>
                            <th>Responsable del proceso</th>
                            <th>Fecha de asignación</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($responsablesproceso as $responsable)
							<tr>
								<td>{{$responsable->id}}</td>
								<td>{{$responsable->procesoafecta->nom_proceso_afecta}}</td>
                                <td>{{$responsable->usuario->usr_nombre}} {{$responsable->usuario->usr_apellidos}}</td>
                                <td>{{$responsable->created_at}}</td>
                                <td>{{$responsable->estado->nom_estado}}</td>
                                <td>
                                    <a href="/MantResponsablesProcesoAfecta/{{$responsable->id}}">Modificar</a></td>
                                    
                                		
							 </tr>
					@endforeach
                        
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
<script>
  /*try{
    let URLactual2 = window.location.toString();

let orden = URLactual2.split('=');
if(orden[1]=='error1')
{

alert('Este registro ya existe');
}*/
//else if(orden[1]=='error2')
//{
//alert('Datos de modificación guardados correctamente');
//}
//else if(orden[1]=='error3')
//{
//alert('Datos de registrados correctamente');
//}
//} catch (error) 
//{

}
    function confirmInsert(ev){
        swal({
            text:"El registro ya existe"
            type:"error",
            title:"Error",
            className:'rojo-bg',
            
        });
    }
</script>
</html>
@endsection