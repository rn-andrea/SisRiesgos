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
}
function orden()
{
    var vrOrden = document.getElementById("eleccion").value;
    if(vrOrden=='Todos')
    {
        window.location.href = "/ReporteUsuarios/?orden=1";
    } else if(vrOrden=='Activo')
    {
        window.location.href = "/ReporteUsuarios/?orden=2";
    } else if(vrOrden=='Inactivo')
    {
        window.location.href = "/ReporteUsuarios/?orden=3";
    }
}
function generarPDF()
{
let URLactual2 = window.location.toString();

let ordenPDF = URLactual2.split('=');
if(ordenPDF[1]=='1')
{
window.open("/ReportePDF/?orden=generarpdf1", "_blank");
}else if(ordenPDF[1]=='2')
{
window.open("/ReportePDF/?orden=generarpdf2", "_blank");
}else if(ordenPDF[1]=='3')
{
window.open("/ReportePDF/?orden=generarpdf3", "_blank");
}
}
