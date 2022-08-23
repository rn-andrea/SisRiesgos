@extends('vwMainTemplate')
@section('contenido')

<html>
</br>
        <div class="card mb-4">
           <div class="card-header" style="white-space: nowrap;">
               <i class="fas fa-chart-column"></i>&nbsp; Reporte de gráfico de Riesgos por responsable
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
                 <h1 style="text-align: center;">Reporte de gráfico de Riesgos por responsable</h1>
           <br>
           </br>
            <canvas id="myChart" width="100%" height="40"></canvas>
            </div>
                 </div>
                 </div>
                 <p id="pmaximo">
                    <?php
                    $cantidades=DB::select('SELECT COUNT(id) from riesgos');
                        print_r($cantidades);

                    ?>
                    </p>

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
                    <td name="usuarios" value='{{$reporteRiesgo->usr_creacion}}'>{{$reporteRiesgo->usr_creacion}}</td>
                    </tr>
                    @endforeach
                 </table>

        </div>



      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
         <script src="{{ asset('/mainTemplate/js/html2pdf.bundle.min.js') }}"></script>
      <script>
let variable = document.getElementById('pmaximo').innerHTML;
        let arr = variable.split('=');
        let arr2 = arr[2].split(' ');
        let arr3 = arr2[1].substr(0,2);
        arr3 = arr3.replace(/\s+/g, '');
        document.getElementById('pmaximo').innerHTML = arr3;
        let var1 = parseInt(arr3);


        const nom = document.getElementsByName("usuarios");
        let nom2 = [...nom];
        let Nombres;
        let Nombres2="";
for (i = 0; i < nom.length; i++) {
Nombres = nom2[i];
Nombres2=Nombres2+Nombres.innerText+";";
}
 let Nombres3 =Nombres2.split(';')
    Nombres3.pop();

let cant = document.getElementsByName("cantidad");
let cant2 = [...cant];
let cantidades;
let cantidades2="";
for (i = 0; i < cant.length; i++) {
cantidades = cant2[i];
cantidades2=cantidades2+cantidades.innerText+";";
}
 let cantidades3 =cantidades2.split(';')
    cantidades3.pop();

document.getElementById('datatablesSimple').remove();
document.getElementById('pmaximo').remove();

const ctx2 = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx2, {
   type: 'bar',
  data: {
    labels: Nombres3,
    datasets: [{
      label: "Cantidad",
      backgroundColor: "rgba(13,110,253,1)",
      borderColor: "rgba(2,117,216,1)",
      data: cantidades3,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: var1,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

function generarPDF()
{
const $elementoParaConvertir = document.getElementById('grafico');
window.html2pdf().set({
margin: 1,
filename: "Reporte de gráfico de riesgos por encargado",
image: {
    type: 'jpeg',
    quality: 0.98
},
html2canvas: {
    scale: 8, // entre mayor sea la escala, mejores gráficos
    letterRendering: true,
},
jsPDF: {
    unit: "in",
    format: "a3",
    orientation: 'landscape' // landscape o portrait
}
})
.from($elementoParaConvertir)
.save()
.catch(err => console.log(err));
}

      </script>


</html>
@endsection