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
                <option value="Activo">Riesgos</option>
                <option value="Inactivo">Eventos</option>
                </select>
                </label>
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


</html>
@endsection
