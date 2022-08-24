let URLactual = window.location.toString();

let arr = URLactual.split('=');

var today = new Date();

var now = today.toLocaleDateString('en-GB');

document.getElementById('pfecha').innerHTML=now;
$nombreArch="Reporte de usuarios";
$orientacionArch = "portrait";
if(arr[1]=='generarpdf1')
{
    document.getElementById('h1titulo').innerHTML='Reporte de todos los usuarios';
    $nombreArch="Reporte de usuarios";
    $orientacionArch = "portrait";
}else if(arr[1]=='generarpdf2')
{
    document.getElementById('h1titulo').innerHTML='Reporte de los usuarios activos';
    $nombreArch="Reporte de usuarios activos";
    $orientacionArch = "portrait";
}else if(arr[1]=='generarpdf3')
{
    document.getElementById('h1titulo').innerHTML='Reporte de los usuarios inactivos';
    $nombreArch="Reporte de usuarios inactivos";
    $orientacionArch = "portrait";
}

else if(arr[1]=='generarpdf1Riesgos')
{
    document.getElementById('h1titulo').innerHTML='Reporte de riesgos';
    $nombreArch="Reporte de riesgos";
    $orientacionArch = "landscape";
}else if(arr[1]=='generarpdf2Riesgos')
{
    document.getElementById('h1titulo').innerHTML='Reporte de riesgos por proceso afecta';
    $orientacionArch = "landscape";
}else if(arr[1]=='generarpdf4Riesgos')
{
    document.getElementById('h1titulo').innerHTML='Reporte de riesgos por Acción: Eliminar';
    $orientacionArch = "landscape";
    $nombreArch="Reporte de riesgos por Acción Eliminar";
}else if(arr[1]=='generarpdf5Riesgos')
{
    document.getElementById('h1titulo').innerHTML='Reporte de riesgos por Acción: Mitigar';
    $orientacionArch = "landscape";
    $nombreArch="Reporte de riesgos por Acción Mitigar";
}else if(arr[1]=='generarpdf6Riesgos')
{
    document.getElementById('h1titulo').innerHTML='Reporte de riesgos por Acción: Evitar';
    $orientacionArch = "landscape";
    $nombreArch="Reporte de riesgos por Acción Evitar";
}else if(arr[1]=='generarpdf7Riesgos')
{
    document.getElementById('h1titulo').innerHTML='Reporte de riesgos por Acción: Asumir';
    $orientacionArch = "landscape";
    $nombreArch="Reporte de riesgos por Acción Asumir";
}

else if(arr[1]=='generarpdf1Eventos')
{
    document.getElementById('h1titulo').innerHTML='Reporte de eventos';
    $orientacionArch = "landscape";
    $nombreArch="Reporte de eventos";
}
else if(arr[1]=='generarpdf2Eventos')
{
    document.getElementById('h1titulo').innerHTML='Reporte de eventos por presente año';
    $orientacionArch = "landscape";
    $nombreArch="Reporte de eventos por presente año";
}
else if(arr[1]=='generarpdf3Eventos')
{
    document.getElementById('h1titulo').innerHTML='Reporte de eventos por estado pendiente';
    $orientacionArch = "landscape";
    $nombreArch="Reporte de eventos por estado pendiente";
}
else if(arr[1]=='generarpdf4Eventos')
{
    document.getElementById('h1titulo').innerHTML='Reporte de eventos por estado cerrado resuelto';
    $orientacionArch = "landscape";
    $nombreArch="Reporte de eventos por estado cerrado resuelto";
}
else if(arr[1]=='generarpdf5Eventos')
{
    document.getElementById('h1titulo').innerHTML='Reporte de eventos por estado cerrado no resuelto';
    $orientacionArch = "landscape";
    $nombreArch="Reporte de eventos por estado cerrado no resuelto";
}else if(arr[1]=='generarpdfrevisiones1')
{
    document.getElementById('h1titulo').innerHTML='Reporte de revisiones';
    $orientacionArch = "landscape";
    $nombreArch="Reporte de revisiones";
}else if(arr[1]=='generarpdfrevisiones2')
{
    document.getElementById('h1titulo').innerHTML='Reporte de revisiones de los riesgos';
    $orientacionArch = "landscape";
    $nombreArch="Reporte de revisiones de los riesgos";
}else if(arr[1]=='generarpdfrevisiones3')
{
    document.getElementById('h1titulo').innerHTML='Reporte de revisiones de los eventos';
    $orientacionArch = "landscape";
    $nombreArch="Reporte de revisiones de los eventos";
}

const valores2 = window.location.search;
const urlParams2 = new URLSearchParams(valores2);
if(urlParams2.has('fecha1'))
{

    var fecha1 = urlParams2.get('fecha1');
    var fecha2 = urlParams2.get('fecha2');
    let fecha1local = fecha1.split('-');
    let fecha2local = fecha2.split('-');

    document.getElementById('h1titulo').innerHTML="Reporte de riesgos desde "+fecha1local[2]+"-"+fecha1local[1]+"-"+fecha1local[0]+" hasta "+fecha2local[2]+"-"+fecha2local[1]+"-"+fecha2local[0];
    $nombreArch="Reporte de riesgos por fecha "+fecha1local[2]+"-"+fecha1local[1]+"-"+fecha1local[0]+" hasta "+fecha2local[2]+"-"+fecha2local[1]+"-"+fecha2local[0];
    $orientacionArch = "landscape";
}
generarpdf($nombreArch, $orientacionArch);

function generarpdf($nombrePDF, $orientacionPDF)
{
    const element = document.body;
    html2pdf().from(element).set({
        margin:       1,
        filename: $nombrePDF,
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
