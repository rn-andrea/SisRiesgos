let minimo = document.getElementById("pminimo").innerHTML;
let minimo1 = minimo.split('(');
let minimo2 = minimo1[1].split(')');

let bajo = document.getElementById("pbajo").innerHTML;
let bajo1 = bajo.split('(');
let bajo2 = bajo1[1].split(')');

let moderado = document.getElementById("pmoderado").innerHTML;
let moderado1 = moderado.split('(');
let moderado2 = moderado1[1].split(')');

let alto = document.getElementById("palto").innerHTML;
let alto1 = alto.split('(');
let alto2 = alto1[1].split(')');

let critico = document.getElementById("pcritico").innerHTML;
let critico1 = critico.split('(');
let critico2 = critico1[1].split(')');

const ctx2 = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx2, {
   type: 'bar',
  data: {
    labels: ["Minimo", "Bajo", "Moderado", "Alto", "Crítico"],
    datasets: [{
      label: "Cantidad",
      backgroundColor: ["rgba(13,110,253,1)","rgba(24,135,84,1)","rgba(254,153,7,1)","rgba(244,124,2,1)","rgba(220,53,70,1)"],
      borderColor: "rgba(2,117,216,1)",
      data: [minimo2[0], bajo2[0], moderado2[0], alto2[0], critico2[0]],
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
          max: Math.max(minimo2[0], bajo2[0], moderado2[0], alto2[0], critico2[0]),
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
