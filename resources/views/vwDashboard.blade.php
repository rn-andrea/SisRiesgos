@extends('vwMainTemplate')
@section('contenido')

<!-- jimmy.salazar -->
<style>
    .riesgoalto {
    background-color: #f57c02;}
</style>
<!-- /jimmy.salazar -->
<main>

        <div class="container-fluid px-4">

        <h1 class="mt-4">Panel Principal</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Sistema de Gestión de Riesgos</li>
        </ol>
        <div class="row">
            <div class="col-xl-2 col-md-6">
                <div class="card bg-primary text-white mb-4">

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
                <div class="card bg-success text-white mb-4">
                    <div class="card-body"><p id="pbajo">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto>=5 and id_probabilidad * id_impacto<=9;');
                        print_r($cantidades);
                    ?>
                    </p></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/PanelPrincipal/?consulta=bajo">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body"><p id="pmoderado">
                    <?php
                    $cantidades=DB::select('select count(id) as cantidad from riesgos where id_probabilidad * id_impacto>=10 and id_probabilidad * id_impacto<=14;');
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
                <div class="riesgoalto text-white mb-4">
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
                <div class="card bg-danger text-white mb-4">
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
                        <td onclick="funcion5x1()" class="bg-success text-white">5</td>
                        <td onclick="funcion5x2()" class="bg-warning text-white">10</td>
                        <td onclick="funcion5x3()" style="background-color: #f57c02;" class="text-white">15</td>
                        <td onclick="funcion5x4()" class="bg-danger text-white">20</td>
                        <td onclick="funcion5x5()" class="bg-danger text-white">25</td>
                        </tr>
                        <tr>
                        <th scope="row">Muy probable</th>
                        <td onclick="funcion4x1()" class="bg-primary text-white">4</td>
                        <td onclick="funcion4x2()" class="bg-success text-white">8</td>
                        <td onclick="funcion4x3()" class="bg-warning text-white">12</td>
                        <td onclick="funcion4x4()" style="background-color: #f57c02;" class="text-white">16</td>
                        <td onclick="funcion4x5()" class="bg-danger text-white">20</td>
                        </tr>
                        <tr>
                        <th scope="row">Ocasionalmente</th>
                        <td onclick="funcion3x1()" class="bg-primary text-white">3</td>
                        <td onclick="funcion3x2()" class="bg-success text-white">6</td>
                        <td onclick="funcion3x3()" class="bg-warning text-white">9</td>
                        <td onclick="funcion3x4()" class="bg-warning text-white">12</td>
                        <td onclick="funcion3x5()" style="background-color: #f57c02;" class="text-white">15</td>
                        <tr>
                        <th scope="row">Rara Vez</th>
                        <td onclick="funcion2x1()" class="bg-primary text-white">2</td>
                        <td onclick="funcion2x2()" class="bg-primary text-white">4</td>
                        <td onclick="funcion2x3()" class="bg-success text-white">6</td>
                        <td onclick="funcion2x4()" class="bg-success text-white">8</td>
                        <td onclick="funcion2x5()" class="bg-warning text-white">10</td>
                        </tr>
                        <tr>
                        <th scope="row">Casi Nunca</th>
                        <td onclick="funcion1x1()" class="bg-primary text-white">1</td>
                        <td onclick="funcion1x2()" class="bg-primary text-white">2</td>
                        <td onclick="funcion1x3()" class="bg-primary text-white">3</td>
                        <td onclick="funcion1x4()" class="bg-primary text-white">4</td>
                        <td onclick="funcion1x5()" class="bg-success text-white">5</td>
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
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
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
                <button class="dataTable-input" onclick="todos()">Todos los riesgos</button>
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
                    <tr>
                    <td>{{$reporteRiesgo->id}}</td>
                    <td>{{$reporteRiesgo->nom_riesgos}}</td>
                    <td>{{$reporteRiesgo->des_detalle}}</td>
                    <td>{{$reporteRiesgo->nom_categoria}}</td>
                    <td>{{$reporteRiesgo->id_nomenclatura}}</td>
                    <td>{{$reporteRiesgo->nom_probabilidad}}</td>
                    <td>{{$reporteRiesgo->nom_impacto}}</td>
                    <td>{{$reporteRiesgo->tot_calificacion}}</td>
                    <td>{{$reporteRiesgo->nom_accion}}</td>
                    <td>{{$reporteRiesgo->nom_unidad_medida}}</td>
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
        <script>
        function funcion1x1()
        {
            window.location.href ='/PanelPrincipal/?consulta=1x1';
        }
        function funcion1x2()
        {
            window.location.href ='/PanelPrincipal/?consulta=1x2';
        }
        function funcion1x3()
        {
            window.location.href ='/PanelPrincipal/?consulta=1x3';
        }
        function funcion1x4()
        {
            window.location.href ='/PanelPrincipal/?consulta=1x4';
        }
        function funcion1x5()
        {
            window.location.href ='/PanelPrincipal/?consulta=1x5';
        }

        function funcion2x1()
        {
            window.location.href ='/PanelPrincipal/?consulta=2x1';
        }
        function funcion2x2()
        {
            window.location.href ='/PanelPrincipal/?consulta=2x2';
        }
        function funcion2x3()
        {
            window.location.href ='/PanelPrincipal/?consulta=2x3';
        }
        function funcion2x4()
        {
            window.location.href ='/PanelPrincipal/?consulta=2x4';
        }
        function funcion2x5()
        {
            window.location.href ='/PanelPrincipal/?consulta=2x5';
        }

        function funcion3x1()
        {
            window.location.href ='/PanelPrincipal/?consulta=3x1';
        }
        function funcion3x2()
        {
            window.location.href ='/PanelPrincipal/?consulta=3x2';
        }
        function funcion3x3()
        {
            window.location.href ='/PanelPrincipal/?consulta=3x3';
        }
        function funcion3x4()
        {
            window.location.href ='/PanelPrincipal/?consulta=3x4';
        }
        function funcion3x5()
        {
            window.location.href ='/PanelPrincipal/?consulta=3x5';
        }

        function funcion4x1()
        {
            window.location.href ='/PanelPrincipal/?consulta=4x1';
        }
        function funcion4x2()
        {
            window.location.href ='/PanelPrincipal/?consulta=4x2';
        }
        function funcion4x3()
        {
            window.location.href ='/PanelPrincipal/?consulta=4x3';
        }
        function funcion4x4()
        {
            window.location.href ='/PanelPrincipal/?consulta=4x4';
        }
        function funcion4x5()
        {
            window.location.href ='/PanelPrincipal/?consulta=4x5';
        }

        function funcion5x1()
        {
            window.location.href ='/PanelPrincipal/?consulta=5x1';
        }
        function funcion5x2()
        {
            window.location.href ='/PanelPrincipal/?consulta=5x2';
        }
        function funcion5x3()
        {
            window.location.href ='/PanelPrincipal/?consulta=5x3';
        }
        function funcion5x4()
        {
            window.location.href ='/PanelPrincipal/?consulta=5x4';
        }
        function funcion5x5()
        {
            window.location.href ='/PanelPrincipal/?consulta=5x5';
        }

        function todos()
        {
            window.location.href ='/PanelPrincipal/?consulta=todos';
        }

        let variable = document.getElementById('pminimo').innerHTML;
        let arr = variable.split('=');
        let arr2 = arr[2].split(' ');
        document.getElementById('pminimo').innerHTML = "Mínimo ("+arr2[1].substr(0,1)+")";
        //muestra la cantidad de elementos de minimo que hay en BD


        let variablenum2 = document.getElementById('pbajo').innerHTML;
        let arrnum2 = variablenum2.split('=');
        let arrnum22 = arrnum2[2].split(' ');
        document.getElementById('pbajo').innerHTML = "Bajo ("+arrnum22[1].substr(0,1)+")";
        //muestra la cantidad de elementos de bajo que hay en BD

        let variablenum3 = document.getElementById('pmoderado').innerHTML;
        let arrnum3 = variablenum3.split('=');
        let arrnum33 = arrnum3[2].split(' ');
        document.getElementById('pmoderado').innerHTML = "Moderado ("+arrnum33[1].substr(0,1)+")";

        let variablenum4 = document.getElementById('palto').innerHTML;
        let arrnum4 = variablenum4.split('=');
        let arrnum44 = arrnum4[2].split(' ');
        document.getElementById('palto').innerHTML = "Alto ("+arrnum44[1].substr(0,1)+")";

        let variablenum5 = document.getElementById('pcritico').innerHTML;
        let arrnum5 = variablenum5.split('=');
        let arrnum55 = arrnum5[2].split(' ');
        document.getElementById('pcritico').innerHTML = "Crítico ("+arrnum55[1].substr(0,1)+")";
        </script>



</main>
@endsection