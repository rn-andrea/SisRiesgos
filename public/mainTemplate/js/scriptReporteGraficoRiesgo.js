let variable = document.getElementById('pminimo').innerHTML;
        let arr = variable.split('=');
        let arr2 = arr[2].split(' ');
        let arr22 = arr2[1].substr(0,2);
        arr22 = arr22.replace(/\s+/g, '');
        document.getElementById('pminimo').innerHTML = arr22;
        let var1 = parseInt(arr22);

        let variablenum2 = document.getElementById('pbajo').innerHTML;
        let arrnum2 = variablenum2.split('=');
        let arrnum22 = arrnum2[2].split(' ');
        let arrnum222 = arrnum22[1].substr(0,2);
        arrnum222 = arrnum222.replace(/\s+/g, '');
        document.getElementById('pbajo').innerHTML = arrnum222;
        let var2 = parseInt(arrnum222);

        let variablenum3 = document.getElementById('pmoderado').innerHTML;
        let arrnum3 = variablenum3.split('=');
        let arrnum33 = arrnum3[2].split(' ');
        let arrnum333 = arrnum33[1].substr(0,2);
        arrnum333 = arrnum333.replace(/\s+/g, '');
        document.getElementById('pmoderado').innerHTML = arrnum333;
        let var3 = parseInt(arrnum333);

        let variablenum4 = document.getElementById('palto').innerHTML;
        let arrnum4 = variablenum4.split('=');
        let arrnum44 = arrnum4[2].split(' ');
        let arrnum444 = arrnum44[1].substr(0,2);
        arrnum444 = arrnum444.replace(/\s+/g, '');
        document.getElementById('palto').innerHTML = arrnum444;
        let var4 = parseInt(arrnum444);

        let variablenum5 = document.getElementById('pcritico').innerHTML;
        let arrnum5 = variablenum5.split('=');
        let arrnum55 = arrnum5[2].split(' ');
        let arrnum555 = arrnum55[1].substr(0,2);
        arrnum555 = arrnum555.replace(/\s+/g, '');
        document.getElementById('pcritico').innerHTML = arrnum555;
        let var5 = parseInt(arrnum555);

        let varTotal = var1+var2+var3+var4+var5;
        let var1final;
        let var2final;
        let var3final;
        let var4final;
        let var5final;
        if(var1!=0)
        {
            var1final = var1/varTotal*100;
        }else
        {
            var1final = 0;
        }

        if(var2!=0)
        {
            var2final = var2/varTotal*100;
        }else
        {
            var2final = 0;
        }

        if(var3!=0)
        {
            var3final = var3/varTotal*100;
        }else
        {
            var3final = 0;
        }

        if(var4!=0)
        {
            var4final = var4/varTotal*100;
        }else
        {
            var4final = 0;
        }

        if(var5!=0)
        {
            var5final = var5/varTotal*100;
        }else
        {
            var5final = 0;
        }



        new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["Mínimo ("+var1final+"%)", "Bajo ("+var2final+"%)", "Moderado ("+var3final+"%)", "Alto ("+var4final+"%)", "Crítico ("+var5final+"%)"],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["rgba(13,110,253,1)","rgba(24,135,84,1)","rgba(254,153,7,1)","rgba(244,124,2,1)","rgba(220,53,70,1)"],
        data: [var1final,var2final,var3final,var4final,var5final],
      }],
      font: {
                        size: 30
                    }

    },
    options: {
      title: {
        display: true,
        text: 'Gráfico de Riesgos por impacto',
        fontSize: 30
      }
    }
});

document.getElementById('pminimo').remove();
document.getElementById('pbajo').remove();
document.getElementById('pmoderado').remove();
document.getElementById('palto').remove();
document.getElementById('pcritico').remove();

function generarPDF()
{
const $elementoParaConvertir = document.getElementById('grafico');
window.html2pdf().set({
margin: 1,
filename: "Reporte de gráfico de riesgos por impacto",
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
