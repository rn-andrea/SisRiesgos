let URLactual = window.location.toString();

let arr = URLactual.split('=');

var today = new Date();

var now = today.toLocaleDateString('en-GB');

document.getElementById('pfecha').innerHTML=now;

if(arr[1]=='generarpdf1')
{
    document.getElementById('h1titulo').innerHTML='Reporte de todos los usuarios';

}else if(arr[1]=='generarpdf2')
{
    document.getElementById('h1titulo').innerHTML='Reporte de los usuarios activos';

}else if(arr[1]=='generarpdf3')
{
    document.getElementById('h1titulo').innerHTML='Reporte de los usuarios inactivos';
}
generarpdf();

function generarpdf()
{
const $elementoParaConvertir = document.body;
window.html2pdf().set({
margin: 1,
filename: 'Reporte de usuarios.pdf',
image: {
    type: 'jpeg',
    quality: 0.98
},
html2canvas: {
    scale: 12, // entre mayor sea la escala, mejores gráficos
    letterRendering: true,
},
jsPDF: {
    unit: "in",
    format: "a3",
    orientation: 'portrait' // landscape o portrait
}
})
.from($elementoParaConvertir)
.save()
.catch(err => console.log(err));
}
