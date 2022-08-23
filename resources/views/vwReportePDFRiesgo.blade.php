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
  <img src="{{ asset('/mainTemplate/img/Rossmon.png') }}" alt="Rossmon" style="position:absolute;" width="182" height="98">
 </br>
 <div style="position: absolute; right: 5.3%; font-size: 24px; ">
 <p id="pfecha">
 </p>
 </div>
 </br>
 </br>
 </br>
 </br>
 <h1 id="h1titulo" style="text-align: center;">
 </h1>
  </br>
 </div>
  <div id="DataTable" style="margin: 0 auto; width:95%;" class="dataTable-container">
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
            <script src="{{ asset('/mainTemplate/js/scriptReportePDF.js') }}"></script>
</body>