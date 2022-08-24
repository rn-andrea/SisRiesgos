@extends('vwMainTemplate')
@section('contenido')

<html>
</br>
        <div class="card mb-4">
           <div class="card-header" style="white-space: nowrap;">
               <i class="fas fa-chart-pie"></i>&nbsp; Reporte de gráfico de Riesgos por Proceso Afecta
            </div>
            <div class="card-body">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">
                <div class="dataTable-dropdown">

                </div>
                <div class="dataTable-search">

                <button onclick="generarPDF()" class="dataTable-input">Generar pdf</button>

                </div>
                </div>
                <div id="DataTable" class="dataTable-container">
                 <div id="grafico">
                 <img src="{{ asset('/mainTemplate/img/Rossmon.png') }}" alt="Rossmon" style="position:absolute;" width="182" height="98">
               </br>
               </br>
               </br>
               </br>

            <canvas id="pie-chart" width="100%" height="50"></canvas>
            </div>
                 </div>
                 </div>

                    <table id="datatablesSimple" class="dataTable-table">
                    <thead>
                        <tr>
                            <th>Cantidad</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($reporteRiesgos as $reporteRiesgo)
                    <tr name="filas">
                    <td name="cantidad" value='{{$reporteRiesgo->cantidad}}'>{{$reporteRiesgo->cantidad}}</td>
                    <td name="namNombres" value='{{$reporteRiesgo->nom_proceso_afecta}}'>{{$reporteRiesgo->nom_proceso_afecta}}</td>
                    </tr>
                    @endforeach
                 </table>

        </div>



      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
         <script src="{{ asset('/mainTemplate/js/html2pdf.bundle.min.js') }}"></script>
      <script src="{{ asset('/mainTemplate/js/scriptReporteGraficoRxP.js') }}"></script>


</html>
@endsection
