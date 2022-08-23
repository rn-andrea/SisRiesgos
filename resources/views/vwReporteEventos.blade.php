@extends('vwMainTemplate')
@section('contenido')

<html>
</br>
<div class="card mb-4">
            <div class="card-header">
                <svg class="svg-inline--fa fa-table me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M448 32C483.3 32 512 60.65 512 96V416C512 451.3 483.3 480 448 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H448zM224 256V160H64V256H224zM64 320V416H224V320H64zM288 416H448V320H288V416zM448 256V160H288V256H448z"></path></svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
                Eventos
            </div>
            <div class="card-body">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">
                <div class="dataTable-dropdown">
                <label>Filtrar por: &nbsp;
                <select id="eleccion" onchange="orden()" class="dataTable-selector">
                <option value="Sin filtros">Sin filtros</option>
                <option value="Eventos del presente año">Eventos del presente año</option>
                <option value="Estado pendiente">Estado pendiente</option>
                <option value="Estado cerrado/resuelto">Estado cerrado/resuelto</option>
                <option value="Estado cerrado no resuelto">Estado cerrado no resuelto</option>

                </select>
                </label>
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
                            <th>Riesgo</th>
                            <th>fecha del evento</th>
                            <th>Descripción de situación</th>
                            <th>Descripción de detalle medidas</th>
                            <th>Estado de resolución</th>
                            <th>Accion</th>
                            <th>Evento no resuelto</th>
                            <th>Medida aplicada</th>
                            <th>Unidad de medida</th>
                            <th>Pérdida estimada</th>
                            <th>Rto</th>
                            <th>Lecciones aprendidas</th>
                            <th>Usuario de creación</th>
                            <th>Usuario que modifica</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($reporteEventos as $reporteEvento)
                    <tr>
                    <td>{{$reporteEvento->id_evento}}</td>
                    <td>{{$reporteEvento->nom_evento}}</td>
                    <td>{{$reporteEvento->nom_riesgos}}</td>
                    <td>{{$reporteEvento->fec_evento}}</td>
                    <td>{{$reporteEvento->des_situacion_pre}}</td>
                    <td>{{$reporteEvento->des_detalle_medidas}}</td>
                    <td>{{$reporteEvento->nom_estado_resolucion}}</td>
                    <td>{{$reporteEvento->nombre_accion}}</td>
                    <td>{{$reporteEvento->jus_evento_no_resuelto}}</td>
                    <td>{{$reporteEvento->jus_medida_aplicada}}</td>
                    <td>{{$reporteEvento->nom_unidad_medida}}</td>
                    <td>{{$reporteEvento->num_perdida_estimada}}</td>
                    <td>{{$reporteEvento->num_rto}}</td>
                    <td>{{$reporteEvento->des_lecciones_aprend}}</td>
                    <td>{{$reporteEvento->usr_creacion}}</td>
                    <td>{{$reporteEvento->usr_modifica}}</td>
                    <td>
                    @if($reporteEvento->ind_estado==1)
                    <p>Activo</p>
                    @else
                    <p>Inactivo</p>
                    @endif
                    </td>
                    </tr>
                    @endforeach
                 </table>

                 </div>
                 </div>
        </div>


      <script src="{{ asset('/mainTemplate/js/scriptReporteEventos.js') }}"> </script>


</html>
@endsection