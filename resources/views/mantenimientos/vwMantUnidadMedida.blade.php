@extends('vwMainTemplate')
@section('contenido')

</br>
<form>
<div class="container-fluid px-4">
    <h1 class="mt-4">Mantenimiento Unidad de Medida</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Prototipo (Mockup) Sistema de Gestión de Riesgos</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"></br></li>
        </ol>

    <div class="row">
        <div class="col-sm">
        <label for="txtRiesgo">Descripción de la Unidad de Medida</label>
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
            <button type="submit" class="btn btn-primary my-1">Registrar Unidad</button>
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
                            <td>Estado</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Unidad</td>
                            <td>1,2,3, etc</td>
                            <td>28/06/2022 19:30</td>
                            <td>jisalazar</td>
                            <td></td>
                            <td></td>
                            <td>Activo</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Porcentaje</td>
                            <td>25,50,75, etc</td>
                            <td>28/06/2022 19:35</td>
                            <td>andnavarro</td>
                            <td>28/06/2022 20:14</td>
                            <td>jisalazar</td>
                            <td>Activo</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Monto</td>
                            <td>1250000,15000,23450, etc</td>
                            <td>28/06/2022 19:37</td>
                            <td>jisalazar</td>
                            <td></td>
                            <td></td>
                            <td>Activo</td>
                        </tr>          
                    </tbody>
                </table>
            </div>
    </div>
    
</div>
</form>

@endsection