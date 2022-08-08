@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Unidad de Medida</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
        <form action="/MantUnidadMedida/update/{{$UnidadMedida->id}}" method="POST">
		@csrf
        {{method_field('PUT')}}
    <div class="row">
        <div class="col-sm">
        <label for="txtUnidadMedida">Descripción de la Unidad de Medida</label>
            <input type="text" class="form-control" id="txtUnidadMedida" placeholder=""  value="{{$UnidadMedida->nom_unidad_medida}}" name="NOM_UNIDAD_MEDIA">
        </div>
        <div class="col-sm">
        <label for="txtObservacion">Observación</label>
            <textarea class="form-control" id="txtObservacion" rows="3" name="DES_OBSERVACION">{{$UnidadMedida->des_observacion}}</textarea>
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
            <input type="hidden" class="form-control" id="txtUSRCREACION"  name="USR_CREACION" value="3050500002"> 
            </div>
            <div class="col-sm">
            <input type="hidden" class="form-control" id="txtUSRMODIFICA"  name="USR_MODIFICA" value="3050500002">
            </div>
    
    </br>
    
    <div class="row">
       
        <div class="col-sm">
            <button type="submit" id="btnUnidadMedida" class="btn btn-primary my-1">Actualizar Unidad</button>
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
                            <th>ID </th>
                            <th>Descripción Unidad Medida</th>
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
                            <th>Descripción Unidad Medida</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <th>Estado</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($UnidadMedidas as $UnidadMedida)
                             <tr>
								<td>{{$UnidadMedida->id}}</td>
								<td>{{$UnidadMedida->nom_unidad_medida}}</td>
								<td>{{$UnidadMedida->des_observacion}}</td>
                                <td>{{$UnidadMedida->created_at}}</td>
                                <td>{{$UnidadMedida->usuario->usr_nombre}}</td>
                                <td>{{$UnidadMedida->updated_at}}</td>
                                <td>{{$UnidadMedida->usuario1->usr_nombre}}</td>
                                <td>{{$UnidadMedida->estado->nom_estado}}</td>
                                
                            </tr>
                    @endforeach  
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
</html>

@endsection