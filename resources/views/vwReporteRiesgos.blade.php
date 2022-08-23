@extends('vwMainTemplate')
@section('contenido')

<html>
</br>
<div class="card mb-4">
            <div class="card-header">
                <svg class="svg-inline--fa fa-table me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M448 32C483.3 32 512 60.65 512 96V416C512 451.3 483.3 480 448 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H448zM224 256V160H64V256H224zM64 320V416H224V320H64zM288 416H448V320H288V416zM448 256V160H288V256H448z"></path></svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
                Riesgos
            </div>
            <div class="card-body">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">
                <div class="dataTable-dropdown">
                <label>Filtrar por: &nbsp;
                <select id="eleccion" onchange="orden()" class="dataTable-selector">
                <option value="Sin filtros">Sin filtros</option>
                <option value="Proceso Afecta">Filtrar por Proceso Afecta</option>
                <option value="Accion1">Acción: Eliminar</option>
                <option value="Accion2">Acción: Mitigar</option>
                <option value="Accion3">Acción: Evitar</option>
                <option value="Accion4">Acción: Asumir</option>
                </select>
                </label>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                Fecha desde:
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;
                hasta:
                <form action="/ReporteRiesgos/?orden=3" method="GET">
                <div style="left:487px; position: absolute; top:55px;">
                <label>
                <input type="date" id="fecha1" name="fecha1"
                value="2018-07-22"
                min="2000-01-01" max="2022-08-15" class="dataTable-input" style="width: 170px;">
                </label>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;
                <label>
                <input type="date" id="fecha2" name="fecha2"

                min="2000-01-01" max="2050-08-15" class="dataTable-input" style="width: 170px;">
                </label>
                &nbsp;
                <label>
                <input type="submit" value="Consultar" class="dataTable-input" style="width: 100px;">
                </label>
                </div>
                </form>
                </div>
                <div class="dataTable-search">

                <button onclick="generarPDF()" class="dataTable-input">Generar pdf</button>

                </div>
                </div>
                <div id="DataTable" class="dataTable-container">
                <table id="datatablesSimple" class="dataTable-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Detalle</th>
                            <th>Categoria</th>
                            <th>Proceso Afecta</th>
                            <th>Probabilidad</th>
                            <th>Impacto</th>
                            <th>Calificacion</th>
                            <th>Accion</th>
                            <th>Unidad Medida</th>
                            <th>Estado</th>
                            <th>Archivo</th>
                            <th>Fecha de creacion</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($reporteRiesgos as $reporteRiesgo)
                    <tr>
                    <td>{{$reporteRiesgo->id}}</td>
                    <td>{{$reporteRiesgo->nom_riesgos}}</td>
                    <td>{{$reporteRiesgo->des_detalle}}</td>
                    <td>{{$reporteRiesgo->nombre_categoria}}</td>
                    <td>{{$reporteRiesgo->id_nomenclatura}}</td>
                    <td>{{$reporteRiesgo->nom_probabilidad}}</td>
                    <td>{{$reporteRiesgo->nom_impacto}}</td>
                    <td>{{$reporteRiesgo->tot_calificacion}}</td>
                    <td>{{$reporteRiesgo->nombre_accion}}</td>
                    <td>{{$reporteRiesgo->nom_unidad_medida}}</td>
                    <td>
                    @if($reporteRiesgo->ind_estado==1)
                    <p>Activo</p>
                    @else
                    <p>Inactivo</p>
                    @endif
                    </td>
                    <td><a href='{{Storage::url($reporteRiesgo->nom_archivo)}}'>Link del archivo</a></td>
                    <td>{{$reporteRiesgo->created_at}}</td>
                    </tr>
                    @endforeach
                 </table>
                 </div>
                 </div>
        </div>


      <script src="{{ asset('/mainTemplate/js/scriptReporteRiesgos.js') }}"> </script>


</html>
@endsection
