<head>
 <script src="{{ asset('/mainTemplate/js/html2pdf.bundle.min.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="{{ asset('/mainTemplate/css/styles.css') }}" rel="stylesheet" /> <!-- jimmy.salazar-->
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<title>Reporte de usuarios</title>
 </head>
 <body>
 <div>
  </br>
 </br>
 <div style="position: absolute; right: 5.3%; font-size: 24px; ">
 <p id="pfecha">
 </p>
 </div>
 </br>
 </br>
 <h1 id="h1titulo" style="text-align: center;">
 </h1>
  </br>
 </div>
  <div id="DataTable" style="margin: 0 auto; width:100%;" class="dataTable-container">
                     <table id="datatablesSimple" class="dataTable-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Riesgo</th>
                            <th style="width:100px">fecha del evento</th>
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
                    <td>{{$reporteEvento->nom_accion}}</td>
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
            <script src="{{ asset('/mainTemplate/js/scriptReportePDF.js') }}"></script>
</body>
