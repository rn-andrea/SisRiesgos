let URLactual = window.location.toString();

let arr = URLactual.split('=');
if(arr[1]=='1')
{
    document.getElementById("eleccion").selectedIndex = "0";

}else if(arr[1]=='2')
{
    document.getElementById("eleccion").selectedIndex = "1";
}

function orden()
{
    var vrOrden = document.getElementById("eleccion").value;
    if(vrOrden=='Sin filtros')
    {
        window.location.href = "/ReporteRiesgos/?orden=1";
    } else if(vrOrden=='Proceso Afecta')
    {
        window.location.href = "/ReporteRiesgos/?orden=2";
    }
}

function generarPDF()
{
let URLactual2 = window.location.toString();

let ordenPDF = URLactual2.split('=');
if(ordenPDF[1]=='1')
{
window.open("/ReportePDFRiesgo/?orden=generarpdf1Riesgos", "_blank");
}else if(ordenPDF[1]=='2')
{
window.open("/ReportePDFRiesgo/?orden=generarpdf2Riesgos", "_blank");
}

const valores2 = window.location.search;
const urlParams2 = new URLSearchParams(valores2);

if(urlParams2.has('fecha1'))
{
    var fecha1 = urlParams2.get('fecha1');
    var fecha2 = urlParams2.get('fecha2');
    window.open("/ReportePDFRiesgo/?orden=generarpdf3Riesgos&fecha1="+fecha1+"&fecha2="+fecha2, "_blank");
}


}

try
        {
      const fecha = new Date();
      const anoActual = fecha.getFullYear();
      const mesActual = fecha.getMonth() + 1;
      const hoy = fecha.getDate();

        document.getElementById('fecha1').value = anoActual+"-"+mesActual+"-"+hoy;
        document.getElementById('fecha2').value = anoActual+"-"+mesActual+"-"+hoy;

        for(let i = 1; i < 10; i++)
        {
            if(mesActual==i)
            {
                document.getElementById('fecha1').value = anoActual+"-0"+mesActual+"-"+hoy;
                document.getElementById('fecha2').value = anoActual+"-0"+mesActual+"-"+hoy;
            }
        }
            const valores = window.location.search;
            const urlParams = new URLSearchParams(valores);
            if(urlParams.has('fecha1'))
            {
            var fecha1 = urlParams.get('fecha1');
            var fecha2 = urlParams.get('fecha2');

            document.getElementById('fecha1').value = fecha1;
            document.getElementById('fecha2').value = fecha2;
            }



        }catch(error)
        {

        }
