@extends('vwMainTemplate')
@section('contenido')

<html>
</br>
        <div class="card mb-4">
           <div class="card-header" style="white-space: nowrap;">
               <i class="fas fa-chart-pie"></i>&nbsp; Reporte de gráfico de riesgos según el estado del evento
            </div>
            <div class="card-body">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">
                <div class="dataTable-dropdown">
                    <label>Lista de riesgos: &nbsp;
                <select id="eleccion" onchange="orden()" class="dataTable-selector">
                 <option value="0">Seleccione un riesgo</option>

                @foreach($reporteRiesgos as $reporteRiesgo)
                    <option value="{{$reporteRiesgo->id}}">{{$reporteRiesgo->nom_riesgos}}</option>
                    @endforeach

                </select>
                </label>
                </div>
                <div class="dataTable-search">

                <button id='btnPDF' onclick="generarPDF()" class="dataTable-input">Generar pdf</button>

                </div>
                </div>
                <div id="DataTable" class="dataTable-container">
                <div id="grafico">
                <img src="{{ asset('/mainTemplate/img/Rossmon.png') }}" alt="Rossmon" style="position:absolute;" width="182" height="98">
                <h1 id='h1Aviso' style='text-align: center;'></h1>

</br>
            <canvas id="pie-chart" width="800" height="450"></canvas>
            </div>
                 </div>
                 </div>
                 <p id="pPendiente">
                    <?php
                    try
                    {
                        $host= $_SERVER["HTTP_HOST"];
                        $url= $_SERVER["REQUEST_URI"];
                        $url2 =  "http://" . $host . $url;
                        $components = parse_url($url2);
                        parse_str($components['query'], $results);
                        $parametro = $results['valor'];
                        $cantidades=DB::select('SELECT COUNT(eventos.id_estado_resolucion) as cantidad FROM `eventos` WHERE eventos.ind_estado=1 and eventos.id_estado_resolucion=1 and eventos.id_riesgos = ?;',[$parametro]);
                        print_r($cantidades);
                    } catch (Exception $e) {
                        echo('Sin elementos');
                    }
                    ?>
                    </p>

                    <p id="pCerradoResuelto">
                    <?php
                    try
                    {
                        $host= $_SERVER["HTTP_HOST"];
                        $url= $_SERVER["REQUEST_URI"];
                        $url2 =  "http://" . $host . $url;
                        $components = parse_url($url2);
                        parse_str($components['query'], $results);
                        $parametro = $results['valor'];
                        $cantidades=DB::select('SELECT COUNT(eventos.id_estado_resolucion) as cantidad FROM `eventos` WHERE eventos.ind_estado=1 and eventos.id_estado_resolucion=2 and eventos.id_riesgos = ?;',[$parametro]);
                        print_r($cantidades);
                    } catch (Exception $e) {
                        echo('Sin elementos');
                    }
                    ?>
                    </p>

                    <p id="pCerradoNoResuelto">
                   <?php
                    try
                    {
                        $host= $_SERVER["HTTP_HOST"];
                        $url= $_SERVER["REQUEST_URI"];
                        $url2 =  "http://" . $host . $url;
                        $components = parse_url($url2);
                        parse_str($components['query'], $results);
                        $parametro = $results['valor'];
                        $cantidades=DB::select('SELECT COUNT(eventos.id_estado_resolucion) as cantidad FROM `eventos` WHERE eventos.ind_estado=1 and eventos.id_estado_resolucion=3 and eventos.id_riesgos = ?;',[$parametro]);
                        print_r($cantidades);
                    } catch (Exception $e) {
                        echo('Sin elementos');
                    }
                    ?>
                    </p>
        </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
         <script src="{{ asset('/mainTemplate/js/html2pdf.bundle.min.js') }}"></script>
      <script src="{{ asset('/mainTemplate/js/scriptGraficoEventosxRiesgo.js') }}"></script>
</html>
@endsection
