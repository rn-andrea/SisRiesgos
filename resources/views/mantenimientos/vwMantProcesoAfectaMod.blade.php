@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<div class="container-fluid px-4">
    <h1 class="mt-4">Modificar Proceso Afecta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/MantProcesoAfecta/update/{{$ProcesoAfecta->id}}" method="POST">
	@csrf
    {{method_field('PUT')}}
     <div class="row">
        <div class="col-sm">
        <label for="txtRiesgo">Nomenclatura del Proceso que Afecta</label>
            <input type="text" class="form-control" id="txtClasificacion" placeholder="" name="ID_PROCESO" value="{{$ProcesoAfecta->ID_PROCESO}}">
        </div>
        <div class="col-sm">
        <label for="txtRiesgo">Nombre del Proceso que Afecta</label>
            <input type="text" class="form-control" id="txtClasificacion" placeholder="" name="NOM_PROCESO_AFECTA"  value="{{$ProcesoAfecta->NOM_PROCESO_AFECTA}}">
        </div>
    </div>
    <div class="row">
    
        <div class="col-sm">
        <label for="txtClasificacion">Observación</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3" name="DES_OBSERVACION">{{$ProcesoAfecta->DES_OBSERVACION}}</textarea>
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
    
    <input type="hidden" class="form-control" id="txtUSRCREACION"  name="USR_CREACION" value="3050500002"> 
            </div>
            <div class="col-sm">
            <input type="hidden" class="form-control" id="txtUSRMODIFICA"  name="USR_MODIFICA" value="3050500002">
            </div>
    </br>
    
    <div class="row">
        
        <div class="col-sm">
            <button type="submit" id="btnProcesoAfecta" class="btn btn-primary my-1">Registrar Proceso</button>
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
                            <th>Nomenclatura</th>
                            <th>Nombre Proceso</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Modificación</th>
                            <th>Estado</th>
                            <th>Modificar</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID </th>
                            <th>Nomenclatura</th>
                            <th>Nombre Categoria</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Modificación</th>
                            <td>Estado</td>
                            <th>Modificar</th>
                            
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($ProcesoAfectas as $ProcesoAfecta)
                             <tr>
                                <td>{{$ProcesoAfecta->id}}</td>
								<td>{{$ProcesoAfecta->ID_NOMENCLATURA}}</td>
								<td>{{$ProcesoAfecta->NOM_PROCESO_AFECTA}}</td>
								<td>{{$ProcesoAfecta->DES_OBSERVACION}}</td>
                                <td>{{$ProcesoAfecta->created_at}}</td>
                                <td>{{$ProcesoAfecta->usuario->USR_NOMBRE}}</td>
                                <td>{{$ProcesoAfecta->updated_at}}</td>
                                <td>{{$ProcesoAfecta->usuario1->USR_NOMBRE}}</td>
                                <td>{{$ProcesoAfecta->estado->NOM_ESTADO}}</td>
                             </tr>
                    @endforeach  
                        
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
</html>

@endsection