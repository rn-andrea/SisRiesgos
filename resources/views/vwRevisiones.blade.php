@extends('vwMainTemplate')
@section('contenido')

<html>
    
</br>
<div class="card mb-4">
            <div class="card-header">
                <svg class="svg-inline--fa fa-table me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="table" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M448 32C483.3 32 512 60.65 512 96V416C512 451.3 483.3 480 448 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H448zM224 256V160H64V256H224zM64 320V416H224V320H64zM288 416H448V320H288V416zM448 256V160H288V256H448z"></path></svg><!-- <i class="fas fa-table me-1"></i> Font Awesome fontawesome.com -->
                Revisiones
            </div>
            <div class="card-body">
            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">
                <div class="dataTable-dropdown">
                <label>Filtrar por: &nbsp;
                <select id="eleccion" onchange="orden()" class="dataTable-selector">
                <option value="Todos">Todos</option>
                <option value="Riesgos">Riesgos</option>
                <option value="Eventos">Eventos</option>
                <option value="NomRiesgo">Por Nombre de Riesgo</option>
                <option value="NomEvento">Por Nombre de Evento</option>
                </select>
                <label id="lbl" ></label>
                </label>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <div class="dataTable-dropdown">
                <form action="/Revisiones/?orden=4" method="GET">
                <label id="lbl1" for="nombre1">Nombre del Riesgo</label>
                <select class="form-control" id="nombre1" name="nombre">
                   @foreach ($riesgos as $riesgo)
                        <option value="{{$riesgo['nom_riesgos']}}">{{$riesgo['nom_riesgos']}}</option>
                   @endforeach
                </select>
</br>
                <input type="submit" class="btn btn-primary my-1" id="btn1" value="Consultar" class="dataTable-input" style="width: 100px;">
                </form>
                <form action="/Revisiones/?orden=5" method="GET">
                <label id="lbl2" for="txtClasificacion">Nombre del Riesgo</label>
                <select  class="form-control" id="nombre2" name="nombre">
                   @foreach ($Eventos as $evento)
                        <option value="{{$evento['nom_evento']}}">{{$evento['nom_evento']}}</option>
                   @endforeach
                </select>
                </br>
                <input type="submit" class="btn btn-primary my-1" id="btn2" value="Consultar" class="dataTable-input" style="width: 100px;">
                </form>
                
</div>
                </div><div class="dataTable-search">

               
                
                <button onclick="generarPDF()" class="dataTable-input">Generar pdf</button>
</div>


               
               
                </div>
                <div id="DataTable" class="dataTable-container">
                <table id="datatablesSimple" class="dataTable-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripción proceso</th>
                            <th>Código proceso</th>
                            <th>Nombre del proceso</th>
                            <th>Usuario</th>
                            <th>Fecha realización</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($revisiones as $revision)
                    <tr>
                    <td>{{$revision->id}}</td>
                    <td>{{$revision->descripcion}}</td>
                    <td>{{$revision->codigo}}</td>
                    <td>{{$revision->nombre}}</td>
                    <td>{{$revision->usuario}}</td>
                    <td>{{$revision->created_at}}</td>
                    
                   
                    </tr>
                    @endforeach
                 </table>
                 </div>
                 </div>
        </div>


      <script src="{{ asset('/mainTemplate/js/scriptReporteRevisiones.js') }}"> </script>

      <script>
           
          var cod= document.getElementById("eleccion");
         var selected= cod.options[cod.selectedIndex].text;
          document.querySelector('#lbl').innerText=selected;
         
          $('#lbl').hide();
                if(selected == "Por Nombre de Riesgo"){
                
                     $('#btn2').hide();
                     $('#nombre2').hide();
                     $('#lbl2').hide();
        
                    $('#btn1').show();
                    $('#nombre1').show();
                    $('#lbl1').show();
                }else if(selected == "Por Nombre de Evento"){
                    $('#btn1').hide();
                    $('#nombre1').hide();
                    $('#lbl1').hide();
                    $('#btn2').show();
                    $('#nombre2').show();
                    $('#lbl2').show();
                }else{
                    $('#btn1').hide();
                    $('#btn2').hide();
                    $('#nombre1').hide();
                    $('#nombre2').hide();
                    $('#lbl1').hide();
                    $('#lbl2').hide();
                }
            


</script>
</html>
@endsection
