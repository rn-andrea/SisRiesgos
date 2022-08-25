let variable = document.getElementById('pPendiente').innerHTML;
      let arr = variable.split('=');
      let arr2 = arr[2].split(' ');
      let arr22;
        if(isNaN(arr2[1].substr(0,3))) //is not a number isNaN
        {
            arr22 = arr2[1].substr(0,2)
        }else
        {
            arr22 =  arr2[1].substr(0,3)
        }
      arr22 = arr22.replace(/\s+/g, '');
      document.getElementById('pPendiente').innerHTML = arr22;
      let var1 = parseInt(arr22);

      let variablenum2 = document.getElementById('pCerradoResuelto').innerHTML;
      let arrnum2 = variablenum2.split('=');
      let arrnum22 = arrnum2[2].split(' ');
      let arrnum222;
        if(isNaN(arrnum22[1].substr(0,3))) //is not a number isNaN
        {
            arrnum222 = arrnum22[1].substr(0,2)
        }else
        {
            arrnum222=  arrnum22[1].substr(0,3)
        }
      arrnum222 = arrnum222.replace(/\s+/g, '');
      document.getElementById('pCerradoResuelto').innerHTML = arrnum222;
      let var2 = parseInt(arrnum222);

      let variablenum3 = document.getElementById('pCerradoNoResuelto').innerHTML;
      let arrnum3 = variablenum3.split('=');
      let arrnum33 = arrnum3[2].split(' ');
      let arrnum333;
        if(isNaN(arrnum33[1].substr(0,3))) //is not a number isNaN
        {
            arrnum333 = arrnum33[1].substr(0,2)
        }else
        {
            arrnum333 =  arrnum33[1].substr(0,3)
        }
      arrnum333 = arrnum333.replace(/\s+/g, '');
      document.getElementById('pCerradoNoResuelto').innerHTML = arrnum333;
      let var3 = parseInt(arrnum333);


      let varTotal = var1+var2+var3;
      let var1final;
      let var2final;
      let var3final;
      if(var1!=0)
      {
          var1final = Number.parseFloat(var1/varTotal*100).toFixed(2);
      }else
      {
          var1final = 0;
      }

      if(var2!=0)
      {
          var2final = Number.parseFloat(var2/varTotal*100).toFixed(2);
      }else
      {
          var2final = 0;
      }

      if(var3!=0)
      {
          var3final = Number.parseFloat(var3/varTotal*100).toFixed(2);
      }else
      {
          var3final = 0;
      }



//--------------------------------validaciones------------------------------
var elem1=document.getElementById('pPendiente').innerHTML;
var elem2=document.getElementById('pCerradoResuelto').innerHTML;
var elem3=document.getElementById('pCerradoNoResuelto').innerHTML;

let URLactual = window.location.toString();

let arrSelect = URLactual.split('=');
document.getElementById("eleccion").value=arrSelect[1];
let eleccionSelect = document.getElementById("eleccion");
let eleccionSelect2 = eleccionSelect.options[eleccionSelect.selectedIndex].text;
if(elem1=='0' && elem2 == '0' && elem3=='0')
{

document.getElementById('h1Aviso').innerHTML = eleccionSelect2 +'<br> Este riesgo no tiene ningún evento';
document.getElementById('pie-chart').remove();
}

document.getElementById('pPendiente').remove();
document.getElementById('pCerradoResuelto').remove();
document.getElementById('pCerradoNoResuelto').remove();

if(arrSelect[1]==0)
{
document.getElementById('h1Aviso').innerHTML = 'Seleccione un riesgo';
document.getElementById('btnPDF').disabled = true;
document.getElementById('pie-chart').remove();
}


//--------------------------------------------------------------

      new Chart(document.getElementById("pie-chart"), {
  type: 'pie',
  data: {
    labels: ["Pendiente ("+var1final+"%)", "Cerrado/Resuelto ("+var2final+"%)", "Cerrado no resuelto ("+var3final+"%)"],
    datasets: [{
      label: "Population (millions)",
      backgroundColor: ["rgba(140,86,75,1)","rgba(23,190,207,1)","rgba(148,103,189,1)"],
      data: [var1final,var2final,var3final],
    }],
    font: {
                      size: 30
                  }

  },
  options: {
    title: {
      display: true,
      text: eleccionSelect2,
      fontSize: 30
    }
  }
});

function generarPDF()
{
let eleccionNombre = document.getElementById("eleccion");
let eleccionNombre2 = eleccionNombre.options[eleccionNombre.selectedIndex].text;

const $elementoParaConvertir = document.getElementById('grafico');
window.html2pdf().set({
margin: 1,
filename: "Reporte de gráfico de eventos por riesgo ("+eleccionNombre2+")",
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


function orden()
{
  var vrOrden = document.getElementById("eleccion").value;

      window.location.href = "/ReporteGraficoEventosxRiesgo/?valor="+vrOrden;

}
