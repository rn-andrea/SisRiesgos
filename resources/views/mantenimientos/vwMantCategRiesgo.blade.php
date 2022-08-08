@extends('vwMainTemplate')
@section('contenido')

</br>
<html>
<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Categoría Riesgo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"> Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>
    <form action="/MantCategoria/store" method="POST">
     @csrf
    <div class="row">
        <div class="col-sm">
        <label for="txtCategoria">Nombre de la Categoría</label>
            <input type="text" class="form-control" id="txtCategoria" placeholder="Digite el nombre descriptivo de la categoría"name="NOM_CATEGORIA">
        </div>
        <div class="col-sm">
        <label for="txtObservacion">Observación</label>
            <textarea class="form-control" id="txtObservacion" rows="3" name="DES_OBSERVACION" placeholder="Digite las observaciones necesarias"></textarea>
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
            <button type="submit" class="btn btn-primary my-1">Registrar Categoría</button>
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
                            <th>Nombre Categoria</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Consecutivo</th>
                            <th>Nombre Categoria</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Creación</th>
                            <td>Estado</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($categoriariesgos as $CatRiesgo)
                             <tr>
								<td>{{$CatRiesgo->id}}</td>
								<td>{{$CatRiesgo->nom_categoria}}</td>
								<td>{{$CatRiesgo->des_observacion}}</td>
                                <td>{{$CatRiesgo->created_at}}</td>
                                <td>{{$CatRiesgo->usuario->usr_nombre}}</td>
                                <td>{{$CatRiesgo->updated_at}}</td>
                                <td>{{$CatRiesgo->usuario1->usr_nombre}}</td>
                                <td>{{$CatRiesgo->estado->nom_estado}}</td>
                                <td>  <a href="/MantCategoria/{{$CatRiesgo->id}}">Modificar</a></td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
</form>
</html>
@endsection