
        const nom = document.getElementsByName("namNombres");
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

var cantidades4 = new Array();
for(j=0;j<cantidades3.length;j++)
{
    cantidades4[j]=parseInt(cantidades3[j]);
}

const reducer = (accumulator, curr) => accumulator + curr;
//alert(cantidades4.reduce(reducer));

var total=cantidades4.reduce(reducer);
var porcentajes = new Array();

for(k=0;k<cantidades4.length;k++)
{
    porcentajes[k]=Number.parseFloat(cantidades4[k]/total*100).toFixed(2);
}

var Nombres4 = new Array();

for(l=0;l<Nombres3.length;l++)
{
    Nombres4[l]=Nombres3[l]+ " ("+porcentajes[l]+"%)";
}

var colores = new Array();

var vrred;
var vrgreen;
var vrblue;

for(m=0;m<Nombres4.length;m++)
{
    vrred = Math.floor(Math.random() * 250);
    vrgreen = Math.floor(Math.random() * 250);
    vrblue = Math.floor(Math.random() * 250);

    colores[m] = 'rgba('+vrred+','+vrgreen+','+vrblue+',1)';
}

//alert(porcentajes[0]);

 new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: Nombres4,
      datasets: [{
        label: "Population (millions)",
        backgroundColor: colores,
        data: porcentajes,
      }],
      font: {
                        size: 30
                    }

    },
    options: {
      title: {
        display: true,
        text: 'Gráfico de Riesgos por Proceso Afecta',
        fontSize: 30
      }
    }
});

function generarPDF()
{
const $elementoParaConvertir = document.getElementById('grafico');
window.html2pdf().set({
margin: 1,
filename: "Reporte de gráfico de riesgos por proceso afecta",
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
