@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Proceso Afecta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/MantProcesoAfecta/store" method="POST">
     @csrf
     <div class="row">
        <div class="col-sm">
        <label for="txtRiesgo">Nomenclatura del Proceso que Afecta</label>
            <input type="text" class="form-control" id="txtClasificacion" placeholder="Digite tres letras que representen el proceso" name="ID_NOMENCLATURA">
        </div>
        <div class="col-sm">
        <label for="txtRiesgo">Nombre del Proceso que Afecta</label>
            <input type="text" class="form-control" id="txtClasificacion" placeholder="Nombre descriptivo del proceso que afecta" name="NOM_PROCESO_AFECTA">
        </div>
    </div>
    <div class="row">
    
        <div class="col-sm">
        <label for="txtClasificacion">Observación</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3" name="DES_OBSERVACION" placeholder="Digite las observaciones necesarias"></textarea>
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
            <button type="submit" class="btn btn-primary my-1">Registrar Proceso</button>
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
                            <th>Codigo</th>
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
                            <th>Codigo</th>
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
								<td>{{$ProcesoAfecta->id_nomenclatura}}</td>
								<td>{{$ProcesoAfecta->nom_proceso_afecta}}</td>
								<td>{{$ProcesoAfecta->des_observacion}}</td>
                                <td>{{$ProcesoAfecta->created_at}}</td>
                                <td>{{$ProcesoAfecta->usuario->usr_nombre}}</td>
                                <td>{{$ProcesoAfecta->updated_at}}</td>
                                <td>{{$ProcesoAfecta->usuario1->usr_nombre}}</td>
                                <td>{{$ProcesoAfecta->estado->nom_estado}}</td>
                                <td>  <a href="/MantProcesoAfecta/{{$ProcesoAfecta->id}}">Modificar</a></td>
                            </tr>
                    @endforeach  
                        
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
</html>

@endsection