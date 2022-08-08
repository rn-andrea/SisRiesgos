@extends('vwMainTemplate')
@section('contenido')
<html>
</br>

<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Responsables por Proceso que Afecta</h1>
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
                <select id="cbRol" class="form-control" name="ID_PROCESO_AFECTA" >
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
                <select id="cbRol" class="form-control" name="ID_RESPONSABLE" >
                   @foreach ($usuariorespon as $usuario)
                        <option value="{{$usuario['id_usuario']}}">{{$usuario['id_usuario']}} {{$usuario['usr_nombre']}} {{$usuario['usr_apellidos']}}</option>
                   @endforeach
                </select>
                </div>
            </div>
        </br>
            <div class="row">
            <div class="col-sm" ></div>
                <div class="col-sm">
                    <button type="submit" class="btn btn-primary my-1">Registrar Responsable</button>
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
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($responsablesproceso as $responsable)
							<tr>
								<td>{{$responsable->id}}</td>
								<td>{{$responsable->procesoafecta->nom_proceso_afecta}}</td>
                                <td>{{$responsable->usuario->usr_nombre}} {{$responsable->usuario->usr_apellidos}}</td>
								<td>
                                    <a href="/MantResponsables/{{$responsable->id}}">Modificar</a></td>
                                		
							 </tr>
					@endforeach
                        
                    </tbody>
                </table>
            </div>
    </div>
    
</div>

</html>
@endsection