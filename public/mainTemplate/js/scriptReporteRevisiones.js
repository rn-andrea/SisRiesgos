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
}else if(arr[1]=='5')
{
    document.getElementById("eleccion").selectedIndex = "4";
}
function orden()
{
    var vrOrden = document.getElementById("eleccion").value;
    if(vrOrden=='Todos')
    {
        window.location.href = "/Revisiones/?orden=1";
    } else if(vrOrden=='Riesgos')
    {
        window.location.href = "/Revisiones/?orden=2";
    } else if(vrOrden=='Eventos')
    {
        window.location.href = "/Revisiones/?orden=3";
    } else if(vrOrden=='NomRiesgo')
    {
        window.location.href = "/Revisiones/?orden=4";
    }else if(vrOrden=='NomEvento')
    {
        window.location.href = "/Revisiones/?orden=5";
    }
}
function generarPDF()
{
let URLactual2 = window.location.toString();

let ordenPDF = URLactual2.split('=');
if(ordenPDF[1]=='1')
{
window.open("/ReporteRevisionesPDF/?orden=generarpdfrevisiones1", "_blank");
}else if(ordenPDF[1]=='2')
{
window.open("/ReporteRevisionesPDF/?orden=generarpdfrevisiones2", "_blank");
}else if(ordenPDF[1]=='3')
{
window.open("/ReporteRevisionesPDF/?orden=generarpdfrevisiones3", "_blank");
}else if(ordenPDF[1]=='4')
{
    
    window.open("/ReporteRevisionesPDF/?orden=generarpdfrevisiones4", "_blank");
}else if(ordenPDF[1]=='5')
{
    
 window.open("/ReporteRevisionesPDF/?orden=generarpdfrevisiones5", "_blank");
}else{
    const valores2 = window.location.search;
    const urlParams2 = new URLSearchParams(valores2);

    if(urlParams2.has('nombre'))
    {
        var nombre = urlParams2.get('nombre');
    }
    window.open("/ReporteRevisionesPDF/?orden=generarpdfrevisiones6&nombre="+nombre, "_blank");
}





}



