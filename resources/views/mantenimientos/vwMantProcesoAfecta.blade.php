@extends('vwMainTemplate')
@section('contenido')

</br>
<form>
<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Proceso Afecta</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Prototipo (Mockup) Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>

    <div class="row">
        <div class="col-sm">
        <label for="txtRiesgo">Nombre del Proceso que Afecta</label>
            <input type="text" class="form-control" id="txtClasificacion" placeholder="">
        </div>
        <div class="col-sm">
        <label for="txtClasificacion">Observación</label>
            <textarea class="form-control" id="txtDetalleRiesgo" rows="3"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-sm">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" checked>
            <label class="form-check-label" for="defaultCheck2">
                Estado Activo
            </label>
    </div>
    
    
    </br>
    
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
            <button type="submit" class="btn btn-primary my-1">Registrar Proceso</button>
        </div>    
        <div class="col-sm"></div>
    </div>

    </br>
    
    <div class="row">
    <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID Consecutivo</th>
                            <th>Nombre Proceso</th>
                            <th>Observacion</th>
                            <th>Fecha Creación</th>
                            <th>Usuario Creación</th>
                            <th>Fecha Modificación</th>
                            <th>Usuario Modificación</th>
                            <th>Estado</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
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
                            <th>Usuario Modificación</th>
                            <td>Estado</td>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Proceso 1</td>
                            <td></td>
                            <td>28/06/2022</td>
                            <td>jisalazar</td>
                            <td></td>
                            <td></td>
                            <td>Activo</td>
                            <td><a href="#" class="link-primary">Modificar</a></td>
                            <td><a href="#" class="link-primary">Eliminar</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Proceso 2</td>
                            <td></td>
                            <td>28/06/2022</td>
                            <td>andnavarro</td>
                            <td>28/06/2022</td>
                            <td>jisalazar</td>
                            <td>Activo</td>
                            <td><a href="#" class="link-primary">Modificar</a></td>
                            <td><a href="#" class="link-primary">Eliminar</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Proceso 3</td>
                            <td></td>
                            <td>28/06/2022</td>
                            <td>jisalazar</td>
                            <td></td>
                            <td></td>
                            <td>Activo</td>
                            <td><a href="#" class="link-primary">Modificar</a></td>
                            <td><a href="#" class="link-primary">Eliminar</a></td>
                        </tr>
                        
                        
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
</form>

@endsection