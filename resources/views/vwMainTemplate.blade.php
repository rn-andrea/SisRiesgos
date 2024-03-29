<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('/mainTemplate/css/styles.css') }}" rel="stylesheet" /> <!-- jimmy.salazar-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="/PanelPrincipal">IT Rossmon</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <!--input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button-->
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Configuración</a></li>
                        <li><a class="dropdown-item" href="#!">Actividad</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <form action="/logout" method="POST">
                        @csrf
                        @auth
                        <li><a class="dropdown-item" onclick="this.closest('form').submit()" href="#!">Cerrar Sesión</a></li>
                       @else
                         <li><a class="dropdown-item" onclick="this.closest('form').submit()" href="#!">Login</a></li>
                       @endauth
                        </form>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Sistema de Riesgos</div>
                            <a class="nav-link" href="/PanelPrincipal">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Panel Principal
                            </a>
                            @auth
                            <div id="us1" class="sb-sidenav-menu-heading">Procesos</div>
                          
                            <a id="us22" class="nav-link"  class="nav-link" href="/identificarriesgo" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Identificar Riesgos
                            </a>
                            
                            
                            <a id="us22" class="nav-link"  class="nav-link" href="/evento/?id=1" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Registrar Eventos
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div id="usMant" class="sb-sidenav-menu-heading">Mantenimientos</div>
                            <a id="us2" class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseMant" aria-expanded="false" aria-controls="collapseLayouts">
                                <div id='divMant' class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                               <div id='divMantTitulo'> Mantenimientos del Sistema</div>
                                <div id='collapseMant' class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseMant" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a id="repgrafico" class="nav-link" href="/MantUsuarios">Mantenimiento de Usuarios</a>
                                    <a id="repgrafico" class="nav-link" href="/MantRoles">Mantenimiento de Roles</a>
                                    <a id="repusuarios" class="nav-link" href="/MantCategoria">Mantenimiento Categoría Riesgo</a>
                                    <a id="repeventos" class="nav-link" href="/MantAccion">Mantenimiento Acción Riesgo</a>
                                    <a id="repriesgos" class="nav-link" href="/MantProbabilidad">Mantenimiento Probabilidad Riesgo</a>
                                    <a id="repusuarios" class="nav-link" href="/MantImpacto">Mantenimiento Impacto Riesgo</a>
                                    <a id="repRev" class="nav-link" href="/MantUnidadMedida">Mantenimiento Unidad de Medida</a>
                                    <a id="repRev" class="nav-link" href="/MantEstadosEvento">Mantenimiento Estado Eventos</a>
                                    <a id="repRev" class="nav-link" href="/MantProcesoAfecta">Mantenimiento Proceso Afecta</a>
                                    <a id="repRev" class="nav-link" href="/MantResponsablesProcesoAfecta">Mantenimiento Responsable de Proceso Afecta</a>
                                </nav>
                            </div>
                            <div id="us2" class="sb-sidenav-menu-heading">Estrategia</div>
                            
                            <a id="us222" class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReportes" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Reportes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseReportes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a id="repgrafico" class="nav-link" href="/ReporteGraficoRiesgos">Reporte gráfico de riesgos</a>
                                    <a id="repgrafico" class="nav-link" href="/ReporteGraficoEventosxRiesgo/?valor=0">Reporte de gráfico de riesgos según el estado del evento</a>
                                    <a id="repusuarios" class="nav-link" href="/graficoriegosxresp">Reporte gráfico de riesgos por responsable</a>
                                    <a id="repeventos" class="nav-link" href="/ReporteEvento/?orden=1">Reporte de eventos</a>
                                    <a id="repriesgos" class="nav-link" href="/ReporteRiesgos/?orden=1">Reporte de riesgos</a>
                                    <a id="repusuarios" class="nav-link" href="/ReporteUsuarios/?orden=1">Reporte de usuarios</a>
                                    <a id="repriesgosxprocafect" class="nav-link" href="/graficoriegosxpocafect">Reporte gráfico de riesgos por proceso afecta</a>
                                </nav>
                            </div>
                            <a id="usRevisiones" class="nav-link"  class="nav-link" href="/Revisiones/?orden=1" >
                                <div id='divRevisiones' class="sb-nav-link-icon"><i class="fas fa-chart-area"></i>
                                Revisiones</div>
                            </a>
                            @endauth
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div id='nameDiv' class="small">
                        <?php
        try {
         $correo = auth()->user()->email;
        $consulta = DB::table('usuarios')->select('ID_ROL')->where('USR_EMAIL',$correo)->value('ID_ROL');
         
         $consulta0 = DB::table('usuarios')->select('USR_NOMBRE')->where('USR_EMAIL',$correo)->value('USR_NOMBRE');
         $consulta1 = DB::table('usuarios')->select('USR_APELLIDOS')->where('USR_EMAIL',$correo)->value('USR_APELLIDOS');
         echo '<p>Usuario logueado como: </br>'.$consulta0.' '.$consulta1.'</p>';
         if($consulta=='2')
         {
             echo "<script>document.getElementById('usMant').remove();</script>";
             echo "<script>document.getElementById('us11').remove()</script>";
             echo "<script>document.getElementById('us111').remove()</script>";
             echo "<script>document.getElementById('usRevisiones').remove()</script>";
             echo "<script>document.getElementById('divMant').remove()</script>";
             echo "<script>document.getElementById('divMant2').remove()</script>";
             echo "<script>document.getElementById('divRevisiones').remove()</script>";
             echo "<script>document.getElementById('divMantTitulo').remove()</script>";
             echo "<script>document.getElementById('flechaMant').remove()</script>";
             echo "<script>document.getElementById('divMantTitulo').remove()</script>";
             echo "<script>document.getElementById('collapseMant').remove()</script>";
             
         }
         
         } catch (Exception $e) {

         }

       
        ?>
                        </div>

                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('contenido')
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; IT Rossmon: Sistema de Gestión de Riesgos | Elaborado por: Jimmy Salazar, Maikol Navarro y Andrea Rojas 2022-2023</div>
                            <div>
                                <!--a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a-->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <?php
       /* try {
         $correo = auth()->user()->email;
         $consulta = DB::table('usuarios')->select('ID_ROL')->where('USR_EMAIL',$correo)->value('ID_ROL');
        if($consulta=='2')
        {
            echo "<script>document.getElementById('us1').remove();</script>";
            echo "<script>document.getElementById('us11').remove()</script>";
            echo "<script>document.getElementById('us111').remove()</script>";
        }
        } catch (Exception $e) {

        }*/
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('/mainTemplate/js/scripts.js') }}"></script> <!-- jimmy.salazar-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('/mainTemplate/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('/mainTemplate/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('/mainTemplate/js/datatables-simple-demo.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script scr="{{ asset('js/app.js') }}"></script>

        @yield('js')
    </body>

</html>