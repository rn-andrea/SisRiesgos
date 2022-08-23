function funcionAxB(elemento)
{
   window.location.href ='/PanelPrincipal/?consulta='+elemento.id;
}


function todos()
{
    window.location.href ='/PanelPrincipal/?consulta=todos';
}

function generarPDF()
{
    let elementos = document.getElementsByName("filas");

for(var i=0;i<elementos.length;i++)
{
    elementos[i].style.backgroundColor="rgb(240,240,240)";
}

      var element = document.getElementById('mcontenido');

html2pdf().from(element).set({
margin:       1,
filename: 'Reporte DashBoard.pdf',
image: {
        type: 'jpeg',
        quality: 0.98
    },
    html2canvas: {
        scale: 6, // entre mayor sea la escala, mejores gráficos
        letterRendering: true,
    },
pageBreak: { mode: 'css', before:'#nextpage1'},
jsPDF: {orientation: 'landscape', unit: 'in', format: 'Tabloid'}
}).toPdf().get('pdf').then(function (pdf) {
var totalPages = pdf.internal.getNumberOfPages();

for (i = 1; i <= totalPages; i++) {
pdf.setPage(i);
pdf.setFontSize(10);
pdf.setTextColor(150);
pdf.text('Página ' + i + ' de ' + totalPages, (pdf.internal.pageSize.getWidth()/2.25), (pdf.internal.pageSize.getHeight()-0.2));


}
}).save();
}

let variable = document.getElementById('pminimo').innerHTML;
let arr = variable.split('=');
let arr2 = arr[2].split(' ');
let arr3 = arr2[1].substr(0,2);
arr3 = arr3.replace(/\s+/g, '');
document.getElementById('pminimo').innerHTML = "Mínimo ("+arr3 +")";

//muestra la cantidad de elementos de minimo que hay en BD


let variablenum2 = document.getElementById('pbajo').innerHTML;
let arrnum2 = variablenum2.split('=');
let arrnum22 = arrnum2[2].split(' ');
let arrnum222 = arrnum22[1].substr(0,2);
arrnum222 = arrnum222.replace(/\s+/g, '');
document.getElementById('pbajo').innerHTML = "Bajo ("+arrnum222+")";
//muestra la cantidad de elementos de bajo que hay en BD

let variablenum3 = document.getElementById('pmoderado').innerHTML;
let arrnum3 = variablenum3.split('=');
let arrnum33 = arrnum3[2].split(' ');
let arrnum333 = arrnum33[1].substr(0,2);
arrnum333 = arrnum333.replace(/\s+/g, '');
document.getElementById('pmoderado').innerHTML = "Moderado ("+arrnum333+")";

let variablenum4 = document.getElementById('palto').innerHTML;
let arrnum4 = variablenum4.split('=');
let arrnum44 = arrnum4[2].split(' ');
let arrnum444 = arrnum44[1].substr(0,2);
arrnum444 = arrnum444.replace(/\s+/g, '');
document.getElementById('palto').innerHTML = "Alto ("+arrnum444+")";

let variablenum5 = document.getElementById('pcritico').innerHTML;
let arrnum5 = variablenum5.split('=');
let arrnum55 = arrnum5[2].split(' ');
let arrnum555 = arrnum55[1].substr(0,2);
arrnum555 = arrnum555.replace(/\s+/g, '');
document.getElementById('pcritico').innerHTML = "Crítico ("+arrnum555+")";

try
{
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var parametro = urlParams.get('consulta');

    document.getElementById(parametro).style.borderColor = 'black';
    document.getElementById(parametro).style.borderWidth = 'medium';
    document.getElementById(parametro).style.borderStyle = 'dashed';
    //border-style: dashed solid;

}catch(error)
{

}
