@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Estados de Evento</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/MantEstadosEvento/update/{{$estadoresolucion->id}}" method="POST">
	@csrf
    {{method_field('PUT')}}
    <div class="row">
        <div class="col-sm">
        <label for="txtRiesgo">Descripción Estado</label>
            <input type="text" class="form-control" id="txtClasificacion" placeholder="" name="NOM_ESTADO_RESOLUCIOND" value="{{$estadoresolucion->NOM_ESTADO_RESOLUCIOND}}">
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Observación</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3" name="DES_OBSERVACION">{{$estadoresolucion->DES_OBSERVACION}}</textarea>
        </div>
    </div>

    <div class="row">
    <div class="col-sm">
			<input class="form-check-input" type="hidden" value="2" name="IND_ESTADO" >
            <input class="form-check-input" type="checkbox" value="1" name="IND_ESTADO" id="defaultCheck3" checked>
            <label class="form-check-label" for="Activo">
                Estado Activo
            </label>
    </div>
    
    
    </br>
    
    <div class="row">
        
        <div class="col-sm">
            <button type="submit" id="btnEstadoResolucion2" class="btn btn-primary my-1">Actualizar  Estado</button>
        </div>    
        <div class="col-sm"></div>
    </div>
    <input type="hidden" class="form-control" id="txtUSRCREACION"  name="USR_CREACION" value="3050500002"> 
            </div>
            <div class="col-sm">
            <input type="hidden" class="form-control" id="txtUSRMODIFICA"  name="USR_MODIFICA" value="3050500002">
            </div>
    </br>
</form>
    <div class="row">
    <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción Estado</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tbody>
                    @foreach($estadoresolucions as $estadoresolucion)
                             <tr>
								<td>{{$estadoresolucion->id}}</td>
								<td>{{$estadoresolucion->NOM_ESTADO_RESOLUCIOND}}</td>
								<td>{{$estadoresolucion->DES_OBSERVACION}}</td>
                                <td>{{$estadoresolucion->created_at}}</td>
                                <td>{{$estadoresolucion->usuario->USR_NOMBRE}}</td>
                                <td>{{$estadoresolucion->updated_at}}</td>
                                <td>{{$estadoresolucion->usuario1->USR_NOMBRE}}</td>
                                <td>{{$estadoresolucion->estado->NOM_ESTADO}}</td>
                            </tr>
                    @endforeach   
                         
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
</html>

@endsection