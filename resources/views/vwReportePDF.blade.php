<head>
 <script src="{{ asset('/mainTemplate/js/html2pdf.bundle.min.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="{{ asset('/mainTemplate/css/styles.css') }}" rel="stylesheet" /> <!-- jimmy.salazar-->
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
<title>Reporte de usuarios</title>
 </head>
 <body>
 <div>
  </br>
  <img src="{{ asset('/mainTemplate/img/Rossmon.png') }}" alt="Rossmon" style="position:absolute;" width="182" height="98">
 </br>
 <div style="position: absolute; right: 5.3%; font-size: 24px; ">
 <p id="pfecha">
 </p>
 </div>
 </br>
 </br>
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
                        Nombre</th><th style="width: 15.6364%;">
                        Apellidos</th><th style="width: 9.16364%;">
                        Email</th><th style="width: 15.2%;">
                        Estado</th><th style="width: 11.4182%;">
                        Rol
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($reporteusuarios as $reporteusuario)
                    <tr>
                    <td>{{$reporteusuario->id_usuario}}</td>
                    <td>{{$reporteusuario->usr_nombre}}</td>
                    <td>{{$reporteusuario->usr_apellidos}}</td>
                    <td>{{$reporteusuario->usr_email}}</td>
                    <td>
                    @if($reporteusuario->ind_estado==1)
                    <p>Activo</p>
                    @else
                    <p>Inactivo</p>
                    @endif</td>
                    <td>

                    @if($reporteusuario->id_rol==1)
                    <p>Administrativo</p>
                    @else
                    <p>Usuario general</p>
                    @endif</td>
                    </td>
                    </tr>
                    @endforeach

                 </table>
                 </div>
            <script src="{{ asset('/mainTemplate/js/scriptReportePDFUsuarios.js') }}"></script>
</body>