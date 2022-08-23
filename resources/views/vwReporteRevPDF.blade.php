<head>
 <script src="{{ asset('/mainTemplate/js/html2pdf.bundle.min.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="{{ asset('/mainTemplate/css/styles.css') }}" rel="stylesheet" /> <!-- jimmy.salazar-->
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<title>Revisiones</title>
 </head>
 <body>
 <div>
  </br>
 </br>
 <div style="position: absolute; right: 5.3%; font-size: 24px; ">
 <p id="pfecha">
 </p>
 </div>
 </br>
 </br>
 <h1 id="h1titulo" style="text-align: center;">
 </h1>
  </br>
 </div>
  <div id="DataTable" style="margin: 0 auto; width:90%;" class="dataTable-container">
                <table id="datatablesSimple" class="dataTable-table">
                    <thead>
                        <tr>
                        <th style="width: 19.6364%;">
                        ID</th><th style="width: 28.9455%;">
                        Descripción proceso</th><th style="width: 15.6364%;">
                        Código proceso</th><th style="width: 9.16364%;">
                        Nombre del proceso</th><th style="width: 15.2%;">
                        Usuario</th><th style="width: 11.4182%;">
                        Fecha realización
                        </th>
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
            <script src="{{ asset('/mainTemplate/js/scriptReporteRevisiones.js') }}"></script>
</body>