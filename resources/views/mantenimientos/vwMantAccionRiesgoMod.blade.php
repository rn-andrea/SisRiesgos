@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Acción Riesgo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>

    <form action="/MantAccion/update/{{$accion->id}}" method="POST">
    @csrf
    {{method_field('PUT')}}
    <div class="row">
        <div class="col-sm">
        <label for="txtAccion">Descripción de la Acción</label>
            <input type="text" class="form-control" id="txtAccion" name="NOM_ACCION" placeholder="" value="{{$accion->NOM_ACCION}}">
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Observación</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3" name="DES_OBSERVACION">{{$accion->DES_OBSERVACION}}</textarea>
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
    <div class="col-sm">
                    <input type="hidden" class="form-control" id="txtUSRMODIFICA"  name="USR_MODIFICA" value="3050500002">
                    <input type="hidden" class="form-control" id="txtUSRMODIFICA"  name="USR_CREACION" value="3050500002">
                 </div>
    
    </br>
    
    <div class="row">
       
        <div class="col-sm">
            <button type="submit" id="btnAccionRiesgMod" class="btn btn-primary my-1">Actualizar Acción</button>
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
                            <th>ID Consecutivo</th>
                            <th>Descripción Acción</th>
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
                            <th>Descripción Acción</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <td>Estado</td>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($accions as $Accion)
                             <tr>
								<td>{{$Accion->id}}</td>
								<td>{{$Accion->NOM_ACCION}}</td>
								<td>{{$Accion->DES_OBSERVACION}}</td>
                                <td>{{$Accion->created_at}}</td>
                                <td>{{$Accion->usuario->USR_NOMBRE}}</td>
                                <td>{{$Accion->updated_at}}</td>
                                <td>{{$Accion->usuario1->USR_NOMBRE}}</td>
                                <td>{{$Accion->estado->NOM_ESTADO}}</td>
                                <td>  <a href="/MantAccion/{{$Accion->id}}">Modificar</a></td>
                            </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
</html>

@endsection