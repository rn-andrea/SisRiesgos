let URLactual = window.location.toString();

let arr = URLactual.split('=');
if(arr[1]=='1')
{
    document.getElementById("eleccion").selectedIndex = "0";

}else if(arr[1]=='2')
{
    document.getElementById("eleccion").selectedIndex = "1";
}else if(arr[1]=='3')
{
    document.getElementById("eleccion").selectedIndex = "2";

}else if(arr[1]=='4')
{
    document.getElementById("eleccion").selectedIndex = "3";
}if(arr[1]=='5')
{
    document.getElementById("eleccion").selectedIndex = "4";

}

function orden()
{
    var vrOrden = document.getElementById("eleccion").value;
    if(vrOrden=='Sin filtros')
    {
        window.location.href = "/ReporteEvento/?orden=1";
    } else if(vrOrden=='Eventos del presente año')
    {
        window.location.href = "/ReporteEvento/?orden=2";
    }else if(vrOrden=='Estado pendiente')
    {
        window.location.href = "/ReporteEvento/?orden=3";
    }else if(vrOrden=='Estado cerrado/resuelto')
    {
        window.location.href = "/ReporteEvento/?orden=4";
    }else if(vrOrden=='Estado cerrado no resuelto')
    {
        window.location.href = "/ReporteEvento/?orden=5";
    }

}

function generarPDF()
{
let URLactual2 = window.location.toString();

let ordenPDF = URLactual2.split('=');
if(ordenPDF[1]=='1')
{
window.open("/ReportePDFEventos/?orden=generarpdf1Eventos", "_blank");
}else if(ordenPDF[1]=='2')
{
window.open("/ReportePDFEventos/?orden=generarpdf2Eventos", "_blank");
}else if(ordenPDF[1]=='3')
{
window.open("/ReportePDFEventos/?orden=generarpdf3Eventos", "_blank");
}else if(ordenPDF[1]=='4')
{
window.open("/ReportePDFEventos/?orden=generarpdf4Eventos", "_blank");
}else if(ordenPDF[1]=='5')
{
window.open("/ReportePDFEventos/?orden=generarpdf5Eventos", "_blank");
}



}