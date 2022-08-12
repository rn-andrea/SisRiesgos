@extends('vwMainTemplate')
@section('contenido')
<html>
</br>
<script runat="server">


   </script>
<div class="container-fluid px-4">
    <h1 class="mt-4">Modificar Responsables por Proceso que Afecta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
        <form action="/MantResponsablesProcesoAfecta/update/{{$responsablesproceso->id}}" method="POST">
		@csrf
        {{method_field('PUT')}}
            <div class="row">
                <div class="col-sm">
                <label for="selectProceso">Proceso que Afecta</label>
                <select id="selectProceso" class="form-control" name="ID_PROCESO_AFECTA" >
                <option value="{{$responsablesproceso['id_proceso_afecta']}}">{{$responsablesproceso->procesoafecta->nom_proceso_afecta}}</option>
                @foreach ($procesoafectaf as $proceso)
                
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
                <option value="{{$responsablesproceso['usr_responsable_proceso']}}">{{$responsablesproceso->usuario->usr_nombre}} {{$responsablesproceso->usuario->usr_apellidos}}</option>
                   @foreach ($usuariorespon as $usuario)
                        <option value="{{$usuario['id_usuario']}}"> {{$usuario['usr_nombre']}} {{$usuario['usr_apellidos']}}</option>
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
                    <button type="submit" onserverclick="Button_Click" class="btn btn-primary my-1">Actualizar Responsable</button>
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
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($responsablesprocesos as $responsable)
							<tr>
								<td>{{$responsable->id}}</td>
								<td>{{$responsable->procesoafecta->nom_proceso_afecta}}</td>
                                <td>{{$responsable->usuario->usr_nombre}} {{$responsable->usuario->usr_apellidos}}</td>
								<td>{{$responsable->estado->nom_estado}}</td>
                                		
							 </tr>
					@endforeach
                        
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
<script>

</script>
</html>
@endsection