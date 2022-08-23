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
    const element = document.body;
    html2pdf().from(element).set({
        margin:       1,
        filename: 'Reporte de usuarios',
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
