@extends('vwMainTemplate')
@section('contenido')

<html>
</br>
        <div class="card mb-4">
           <div class="card-header" style="white-space: nowrap;">
               <i class="fas fa-chart-pie"></i>&nbsp; Reporte de gráfico de Riesgos por proceso afecta
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
               <canvas id="pie-chart" width="800" height="450"></canvas>
            </div>
                 </div>
                 </div>
                 <p id="pminimo">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto<=4;');
                        print_r($cantidades);
                    ?>
                    </p>

                    <p id="pbajo">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto>=5 and id_probabilidad * id_impacto<=8;');
                        print_r($cantidades);
                    ?>
                    </p>

                    <p id="pmoderado">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto>=9 and id_probabilidad * id_impacto<=14;');
                        print_r($cantidades);
                    ?>
                    </p>

                    <p id="palto">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto>=15 and id_probabilidad * id_impacto<=19;');
                        print_r($cantidades);
                    ?>
                    </p>

                    <p id="pcritico">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto>=20 and id_probabilidad * id_impacto<=25;');
                        print_r($cantidades);
                    ?>
                    </p>
        </div>


      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
         <script src="{{ asset('/mainTemplate/js/html2pdf.bundle.min.js') }}"></script>
      <script src="{{ asset('/mainTemplate/js/scriptReporteGraficoRiesgo.js') }}"></script>


</html>
@endsection