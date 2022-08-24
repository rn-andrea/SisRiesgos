@extends('vwMainTemplate')
@section('contenido')

<!-- jimmy.salazar -->
<style>
    .riesgoalto {
    background-color: #f57c02;}
</style>
<!-- /jimmy.salazar -->
    <input type="button" id="btnpdf" class="dataTable-input" onclick="generarPDF()" style="width:120px; top:10px; position: absolute; right:30px;" value="Generar PDF">

<main id='mcontenido'>

        <div class="container-fluid px-4">
        <div id="prueba" style="display:inline;">

        <h1 class="mt-4">Panel Principal</h1>

        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <div class="row">
            <div class="col-xl-2 col-md-6">
                <div id="minimo" class="card bg-primary text-white mb-4">

                    <div class="card-body"><p id="pminimo">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto<=4;');
                        print_r($cantidades);
                    ?>
                    </p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/PanelPrincipal/?consulta=minimo">Ver Detalle</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div id="bajo" class="card bg-success text-white mb-4">
                    <div class="card-body"><p id="pbajo">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto>=5 and id_probabilidad * id_impacto<=8;');
                        print_r($cantidades);
                    ?>
                    </p></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/PanelPrincipal/?consulta=bajo">Ver Detalle</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div id="moderado" class="card bg-warning text-white mb-4">
                    <div class="card-body"><p id="pmoderado">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto>=9 and id_probabilidad * id_impacto<=14;');
                        print_r($cantidades);
                    ?>
                    </p></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/PanelPrincipal/?consulta=moderado">Ver Detalle</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div id="alto" class="riesgoalto text-white mb-4">
                    <div class="card-body"><p id="palto">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto>=15 and id_probabilidad * id_impacto<=19;');
                        print_r($cantidades);
                    ?>
                    </p></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a style="color:white" href="/PanelPrincipal/?consulta=alto">Ver Detalle</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div id="critico" class="card bg-danger text-white mb-4">
                    <div class="card-body"><p id="pcritico">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto>=20 and id_probabilidad * id_impacto<=25;');
                        print_r($cantidades);
                    ?>
                    </p></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/PanelPrincipal/?consulta=critico">Ver Detalle</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Matriz de Riesgos
                    </div>
                    <!--div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div-->
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">Mínimo</th>
                        <th scope="col">Bajo</th>
                        <th scope="col">Medio</th>
                        <th scope="col">Alto</th>
                        <th scope="col">Crítico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">Casi Siempre</th>
                        <td id="5x1" onclick="funcionAxB(this)" class="bg-success text-white">5</td>
                        <td id="5x2" onclick="funcionAxB(this)" class="bg-warning text-white">10</td>
                        <td id="5x3" onclick="funcionAxB(this)" style="background-color: #f57c02;" class="text-white">15</td>
                        <td id="5x4" onclick="funcionAxB(this)" class="bg-danger text-white">20</td>
                        <td id="5x5" onclick="funcionAxB(this)" class="bg-danger text-white">25</td>
                        </tr>
                        <tr>
                        <th scope="row">Muy probable</th>
                        <td id="4x1" onclick="funcionAxB(this)" class="bg-primary text-white">4</td>
                        <td id="4x2" onclick="funcionAxB(this)" class="bg-success text-white">8</td>
                        <td id="4x3" onclick="funcionAxB(this)" class="bg-warning text-white">12</td>
                        <td id="4x4" onclick="funcionAxB(this)" style="background-color: #f57c02;" class="text-white">16</td>
                        <td id="4x5" onclick="funcionAxB(this)" class="bg-danger text-white">20</td>
                        </tr>
                        <tr>
                        <th scope="row">Ocasionalmente</th>
                        <td id="3x1" onclick="funcionAxB(this)" class="bg-primary text-white">3</td>
                        <td id="3x2" onclick="funcionAxB(this)" class="bg-success text-white">6</td>
                        <td id="3x3" onclick="funcionAxB(this)" class="bg-warning text-white">9</td>
                        <td id="3x4" onclick="funcionAxB(this)" class="bg-warning text-white">12</td>
                        <td id="3x5" onclick="funcionAxB(this)" style="background-color: #f57c02;" class="text-white">15</td>
                        <tr>
                        <th scope="row">Rara Vez</th>
                        <td id="2x1" onclick="funcionAxB(this)" class="bg-primary text-white">2</td>
                        <td id="2x2" onclick="funcionAxB(this)" class="bg-primary text-white">4</td>
                        <td id="2x3" onclick="funcionAxB(this)" class="bg-success text-white">6</td>
                        <td id="2x4" onclick="funcionAxB(this)" class="bg-success text-white">8</td>
                        <td id="2x5" onclick="funcionAxB(this)" class="bg-warning text-white">10</td>
                        </tr>
                        <tr>
                        <th scope="row">Casi Nunca</th>
                        <td id="1x1" onclick="funcionAxB(this)" class="bg-primary text-white">1</td>
                        <td id="1x2" onclick="funcionAxB(this)" class="bg-primary text-white">2</td>
                        <td id="1x3" onclick="funcionAxB(this)" class="bg-primary text-white">3</td>
                        <td id="1x4" onclick="funcionAxB(this)" class="bg-primary text-white">4</td>
                        <td id="1x5" onclick="funcionAxB(this)" class="bg-success text-white">5</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Riesgos Reportados
                    </div>
                    <div class="card-body">

                    <canvas id="myChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Riesgos
            </div>
            <div class="card-body">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">
                <div class="dataTable-dropdown">
                <button class="dataTable-input" id="todos" onclick="todos()">Todos los riesgos</button>
                </div><div class="dataTable-search">


                </div>
                </div>
                <div id="DataTable" class="dataTable-container">
                <table id="datatablesSimple" class="dataTable-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Detalle</th>
                            <th>Categoria</th>
                            <th>Proceso Afecta</th>
                            <th>Probabilidad</th>
                            <th>Impacto</th>
                            <th>Calificacion</th>
                            <th>Accion</th>
                            <th>Unidad Medida</th>
                            <th>Estado</th>
                            <th>Archivo</th>
                            <th>Fecha de creacion</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($reporteRiesgos as $reporteRiesgo)
                    <tr name="filas">
                    <td>{{$reporteRiesgo->id}}</td>
                    <td>{{$reporteRiesgo->nom_riesgos}}</td>
                    <td>{{$reporteRiesgo->des_detalle}}</td>
                    <td>{{$reporteRiesgo->nombre_categoria}}</td>
                    <td>{{$reporteRiesgo->id_nomenclatura}}</td>
                    <td>{{$reporteRiesgo->nom_probabilidad}}</td>
                    <td>{{$reporteRiesgo->nom_impacto}}</td>
                    <td>{{$reporteRiesgo->tot_calificacion}}</td>
                    <td>{{$reporteRiesgo->nombre_accion}}</td>
                    <td>{{$reporteRiesgo->id_unidad_medida}}</td>
                    <td>
                    @if($reporteRiesgo->ind_estado==1)
                    <p>Activo</p>
                    @else
                    <p>Inactivo</p>
                    @endif
                    </td>
                    <td><a href='{{Storage::url($reporteRiesgo->nom_archivo)}}'>Link del archivo</a></td>
                    <td>{{$reporteRiesgo->created_at}}</td>
                    </tr>
                    @endforeach
    </tbody>
                 </table>
                 </div>
                 </div>

        </div>
    </div>
</main>
<script src="{{ asset('/mainTemplate/js/html2pdf.bundle.min.js') }}"></script>
<script src="{{ asset('/mainTemplate/js/scriptDashboard.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="{{ asset('/mainTemplate/js/scriptDashboard2.js') }}"></script>



@endsection@extends('vwMainTemplate')
@section('contenido')

<!-- jimmy.salazar -->
<style>
    .riesgoalto {
    background-color: #f57c02;}
</style>
<!-- /jimmy.salazar -->
    <input type="button" id="btnpdf" class="dataTable-input" onclick="generarPDF()" style="width:120px; top:10px; position: absolute; right:30px;" value="Generar PDF">

<main id='mcontenido'>

        <div class="container-fluid px-4">
        <div id="prueba" style="display:inline;">

        <h1 class="mt-4">Panel Principal</h1>

        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <div class="row">
            <div class="col-xl-2 col-md-6">
                <div id="minimo" class="card bg-primary text-white mb-4">

                    <div class="card-body"><p id="pminimo">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto<=4;');
                        print_r($cantidades);
                    ?>
                    </p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/PanelPrincipal/?consulta=minimo">Ver Detalle</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div id="bajo" class="card bg-success text-white mb-4">
                    <div class="card-body"><p id="pbajo">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto>=5 and id_probabilidad * id_impacto<=8;');
                        print_r($cantidades);
                    ?>
                    </p></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/PanelPrincipal/?consulta=bajo">Ver Detalle</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div id="moderado" class="card bg-warning text-white mb-4">
                    <div class="card-body"><p id="pmoderado">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto>=9 and id_probabilidad * id_impacto<=14;');
                        print_r($cantidades);
                    ?>
                    </p></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/PanelPrincipal/?consulta=moderado">Ver Detalle</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div id="alto" class="riesgoalto text-white mb-4">
                    <div class="card-body"><p id="palto">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto>=15 and id_probabilidad * id_impacto<=19;');
                        print_r($cantidades);
                    ?>
                    </p></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a style="color:white" href="/PanelPrincipal/?consulta=alto">Ver Detalle</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div id="critico" class="card bg-danger text-white mb-4">
                    <div class="card-body"><p id="pcritico">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto>=20 and id_probabilidad * id_impacto<=25;');
                        print_r($cantidades);
                    ?>
                    </p></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/PanelPrincipal/?consulta=critico">Ver Detalle</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Matriz de Riesgos
                    </div>
                    <!--div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div-->
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">Mínimo</th>
                        <th scope="col">Bajo</th>
                        <th scope="col">Medio</th>
                        <th scope="col">Alto</th>
                        <th scope="col">Crítico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">Casi Siempre</th>
                        <td id="5x1" onclick="funcionAxB(this)" class="bg-success text-white">5</td>
                        <td id="5x2" onclick="funcionAxB(this)" class="bg-warning text-white">10</td>
                        <td id="5x3" onclick="funcionAxB(this)" style="background-color: #f57c02;" class="text-white">15</td>
                        <td id="5x4" onclick="funcionAxB(this)" class="bg-danger text-white">20</td>
                        <td id="5x5" onclick="funcionAxB(this)" class="bg-danger text-white">25</td>
                        </tr>
                        <tr>
                        <th scope="row">Muy probable</th>
                        <td id="4x1" onclick="funcionAxB(this)" class="bg-primary text-white">4</td>
                        <td id="4x2" onclick="funcionAxB(this)" class="bg-success text-white">8</td>
                        <td id="4x3" onclick="funcionAxB(this)" class="bg-warning text-white">12</td>
                        <td id="4x4" onclick="funcionAxB(this)" style="background-color: #f57c02;" class="text-white">16</td>
                        <td id="4x5" onclick="funcionAxB(this)" class="bg-danger text-white">20</td>
                        </tr>
                        <tr>
                        <th scope="row">Ocasionalmente</th>
                        <td id="3x1" onclick="funcionAxB(this)" class="bg-primary text-white">3</td>
                        <td id="3x2" onclick="funcionAxB(this)" class="bg-success text-white">6</td>
                        <td id="3x3" onclick="funcionAxB(this)" class="bg-warning text-white">9</td>
                        <td id="3x4" onclick="funcionAxB(this)" class="bg-warning text-white">12</td>
                        <td id="3x5" onclick="funcionAxB(this)" style="background-color: #f57c02;" class="text-white">15</td>
                        <tr>
                        <th scope="row">Rara Vez</th>
                        <td id="2x1" onclick="funcionAxB(this)" class="bg-primary text-white">2</td>
                        <td id="2x2" onclick="funcionAxB(this)" class="bg-primary text-white">4</td>
                        <td id="2x3" onclick="funcionAxB(this)" class="bg-success text-white">6</td>
                        <td id="2x4" onclick="funcionAxB(this)" class="bg-success text-white">8</td>
                        <td id="2x5" onclick="funcionAxB(this)" class="bg-warning text-white">10</td>
                        </tr>
                        <tr>
                        <th scope="row">Casi Nunca</th>
                        <td id="1x1" onclick="funcionAxB(this)" class="bg-primary text-white">1</td>
                        <td id="1x2" onclick="funcionAxB(this)" class="bg-primary text-white">2</td>
                        <td id="1x3" onclick="funcionAxB(this)" class="bg-primary text-white">3</td>
                        <td id="1x4" onclick="funcionAxB(this)" class="bg-primary text-white">4</td>
                        <td id="1x5" onclick="funcionAxB(this)" class="bg-success text-white">5</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Eventos Reportados
                    </div>
                    <div class="card-body">

                    <canvas id="myChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Riesgos
            </div>
            <div class="card-body">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">
                <div class="dataTable-dropdown">
                <button class="dataTable-input" id="todos" onclick="todos()">Todos los riesgos</button>
                </div><div class="dataTable-search">


                </div>
                </div>
                <div id="DataTable" class="dataTable-container">
                <table id="datatablesSimple" class="dataTable-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Detalle</th>
                            <th>Categoria</th>
                            <th>Proceso Afecta</th>
                            <th>Probabilidad</th>
                            <th>Impacto</th>
                            <th>Calificacion</th>
                            <th>Accion</th>
                            <th>Unidad Medida</th>
                            <th>Estado</th>
                            <th>Archivo</th>
                            <th>Fecha de creacion</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($reporteRiesgos as $reporteRiesgo)
                    <tr name="filas">
                    <td>{{$reporteRiesgo->id}}</td>
                    <td>{{$reporteRiesgo->nom_riesgos}}</td>
                    <td>{{$reporteRiesgo->des_detalle}}</td>
                    <td>{{$reporteRiesgo->nombre_categoria}}</td>
                    <td>{{$reporteRiesgo->id_nomenclatura}}</td>
                    <td>{{$reporteRiesgo->nom_probabilidad}}</td>
                    <td>{{$reporteRiesgo->nom_impacto}}</td>
                    <td>{{$reporteRiesgo->tot_calificacion}}</td>
                    <td>{{$reporteRiesgo->nombre_accion}}</td>
                    <td>{{$reporteRiesgo->id_unidad_medida}}</td>
                    <td>
                    @if($reporteRiesgo->ind_estado==1)
                    <p>Activo</p>
                    @else
                    <p>Inactivo</p>
                    @endif
                    </td>
                    <td><a href='{{Storage::url($reporteRiesgo->nom_archivo)}}'>Link del archivo</a></td>
                    <td>{{$reporteRiesgo->created_at}}</td>
                    </tr>
                    @endforeach
                 </table>
                 </div>
                 </div>

        </div>
    </div>
</main>
<script src="{{ asset('/mainTemplate/js/html2pdf.bundle.min.js') }}"></script>
<script src="{{ asset('/mainTemplate/js/scriptDashboard.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="{{ asset('/mainTemplate/js/scriptDashboard2.js') }}"></script>



@endsection