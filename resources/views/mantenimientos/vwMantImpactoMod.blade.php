@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Impacto Riesgo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/MantImpacto/update/{{$impacto->id}}" method="POST">
	@csrf
    {{method_field('PUT')}}
        <div class="row">
            <div class="col-sm">
            <label for="txtRiesgo">Descripción Impacto</label>
                <input type="text" class="form-control" id="txtImpacto" placeholder="" name="NOM_IMPACTO" value="{{$impacto->NOM_IMPACTO}}" >
            </div>
            <div class="col-sm">
            <label for="txtClasificacion">Observación</label>
                <textarea class="form-control" id="txtDetalleRiesgo" rows="3" name="DES_OBSERVACION"  >{{$impacto->DES_OBSERVACION}}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
            <input class="form-check-input" type="hidden" value="2" name="IND_ESTADO" >
                <input class="form-check-input" type="checkbox" value="1" name="IND_ESTADO" id="defaultCheck3" checked>
                <label class="form-check-label" for="defaultCheck2">
                    Estado Activo
                </label>
        </div>
        <div class="col-sm">
                
            <div class="col-sm">
                <input type="hidden" class="form-control" id="txtUSRMODIFICA"  name="USR_MODIFICA" value="3050500002">
            </div>
            </div>
        </br>
        
        <div class="row">
            
            <div class="col-sm">
                <button type="submit" id="bntImpacto" class="btn btn-primary my-1">Actualizar Impacto</button>
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
                            <th>Descripción Impacto</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Consecutivo</th>
                            <th>Descripción Probabilidad</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <td>Estado</td>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($impactos as $impacto)
                             <tr>
								<td>{{$impacto->id}}</td>
								<td>{{$impacto->NOM_IMPACTO}}</td>
								<td>{{$impacto->DES_OBSERVACION}}</td>
                                <td>{{$impacto->created_at}}</td>
                                <td>{{$impacto->usuario->USR_NOMBRE}}</td>
                                <td>{{$impacto->updated_at}}</td>
                                <td>{{$impacto->usuario1->USR_NOMBRE}}</td>
                                <td>{{$impacto->estado->NOM_ESTADO}}</td>
                                 </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
</html>

@endsection