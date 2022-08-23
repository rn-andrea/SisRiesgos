<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProbabilidadController;
use App\Http\Controllers\ImpactoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\CategoriaRiesgoController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\EstadoResolucionController;
use App\Http\Controllers\AccionController;
use App\Http\Controllers\ProcesoAfectaController;
use App\Http\Controllers\ResponsableProcesoAfectaController;
use App\Http\Controllers\RiesgoController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\RegistroUsuarioController;
use App\Http\Controllers\ReporteRiesgosController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ReporteEventosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RevisionesController;
use App\Http\Controllers\ReporteGraficoRXRController;
use App\Http\Controllers\ReporteGraficoRiesgosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/PanelPrincipal');
});

// Mantenimiento de usuarios
Route::get('MantUsuarios/',  [UsuariosController::class, 'index'])->middleware('auth');
Route::post('/MantUsuarios/store',  [UsuariosController::class, 'store'])->middleware('auth');
Route::get('/MantUsuarios/{id}',  [UsuariosController::class, 'show'])->middleware('auth');
Route::put('/MantUsuarios/update/{id}', [UsuariosController::class, 'update'])->middleware('auth');


//roles
Route::get('MantRoles/',  [RolController::class, 'index']);
Route::post('/MantRoles/store',  [RolController::class, 'store']);
Route::get('/MantRoles/{id}',  [RolController::class, 'show']);
Route::put('/MantRoles/update/{id}', [RolController::class, 'update']);

//probabilidad
Route::get('MantProbabilidad/', [ProbabilidadController::class, 'index']);
Route::post('/MantProbabilidad/store',  [ProbabilidadController::class, 'store']);
Route::get('/MantProbabilidad/{id}',  [ProbabilidadController::class, 'show']);
Route::put('/MantProbabilidad/update/{id}', [ProbabilidadController::class, 'update']);

//impacto
Route::get('MantImpacto/', [ImpactoController::class, 'index']);
Route::post('/MantImpacto/store',  [ImpactoController::class, 'store']);
Route::get('/MantImpacto/{id}',  [ImpactoController::class, 'show']);
Route::put('/MantImpacto/update/{id}', [ImpactoController::class, 'update']);

//categoria
Route::get('MantCategoria/', [CategoriaRiesgoController::class, 'index']);
Route::post('/MantCategoria/store',  [CategoriaRiesgoController::class, 'store']);
Route::get('/MantCategoria/{id}',  [CategoriaRiesgoController::class, 'show']);
Route::put('/MantCategoria/update/{id}', [CategoriaRiesgoController::class, 'update']);

//unidaddemedida
Route::get('MantUnidadMedida/', [UnidadMedidaController::class, 'index']);
Route::post('//MantUnidadMedida/store',  [UnidadMedidaController::class, 'store']);
Route::get('//MantUnidadMedida/{id}',  [UnidadMedidaController::class, 'show']);
Route::put('//MantUnidadMedida/update/{id}', [UnidadMedidaController::class, 'update']);

//MantEstadosEvento
Route::get('MantEstadosEvento/', [EstadoResolucionController::class, 'index']);
Route::post('/MantEstadosEvento/store',  [EstadoResolucionController::class, 'store']);
Route::get('/MantEstadosEvento/{id}',  [EstadoResolucionController::class, 'show']);
Route::put('/MantEstadosEvento/update/{id}', [EstadoResolucionController::class, 'update']);

//MantAccion
Route::get('MantAccion/', [AccionController::class, 'index']);
Route::post('/MantAccion/store',  [AccionController::class, 'store']);
Route::get('/MantAccion/{id}',  [AccionController::class, 'show']);
Route::put('/MantAccion/update/{id}', [AccionController::class, 'update']);

//proceso afecta
Route::get('MantProcesoAfecta/', [ProcesoAfectaController::class, 'index']);
Route::post('/MantProcesoAfecta/store',  [ProcesoAfectaController::class, 'store']);
Route::get('/MantProcesoAfecta/{id}',  [ProcesoAfectaController::class, 'show']);
Route::put('/MantProcesoAfecta/update/{id}', [ProcesoAfectaController::class, 'update']);

//responsables proceso afecta
Route::get('MantResponsablesProcesoAfecta/', [ResponsableProcesoAfectaController::class, 'index']);
Route::post('/MantResponsablesProcesoAfecta/store',  [ResponsableProcesoAfectaController::class, 'store']);
Route::get('/MantResponsablesProcesoAfecta/{id}',  [ResponsableProcesoAfectaController::class, 'show']);
Route::put('/MantResponsablesProcesoAfecta/update/{id}', [ResponsableProcesoAfectaController::class, 'update']);

// identificar riesgos
Route::get('identificarriesgo/', [RiesgoController::class, 'index']);
Route::post('/identificarriesgo/store',  [RiesgoController::class, 'store']);
Route::get('/identificarriesgo/{id}',  [RiesgoController::class, 'show']);
Route::put('/identificarriesgo/update/{id}', [RiesgoController::class, 'update']);

// eventos
Route::get('evento/', [EventoController::class, 'index']);
Route::post('/evento/store',  [EventoController::class, 'store']);
Route::get('/evento/{id}',  [EventoController::class, 'show']);
Route::put('/evento/update/{id}', [EventoController::class, 'update']);




   
Route::post('/login/verificar', [loginController::class, 'verificar']);
Route::post('/logout', [loginController::class, 'cerrar']);

Route::get('/ReporteUsuarios', [RegistroUsuarioController::class, 'inicio']);
Route::get('/ReportePDF', [PDFController::class, 'cargarBD']);


Route::get('/PanelPrincipal', [DashboardController::class,'inicio']);

Route::get('/ReporteRiesgos', [ReporteRiesgosController::class, 'inicio']);
Route::get('/ReportePDFRiesgo', [PDFController::class, 'cargarBD']);

Route::get('/ReporteEvento', [ReporteEventosController::class, 'inicio']);
Route::get('/ReportePDFEventos', [PDFController::class, 'cargarBD']);

Route::get('/Revisiones', [RevisionesController::class, 'inicio']);
Route::get('/ReporteRevisionesPDF', [PDFController::class, 'cargarBD']);

Route::get('/graficoriegosxresp',[ReporteGraficoRXRController::class,'inicio'])->middleware('auth');

Route::get('/ReporteGraficoRiesgos', [ReporteGraficoRiesgosController::class,'inicio'])->middleware('auth');

Route::get('/ReporteGraficoEventosxRiesgo', [ReporteGraficoRiesgosController::class,'inicio2'])->middleware('auth');

Route::view('Plantilla','vwMainTemplate')->name('vwMainTemplate');
Route::view('RegistrarEventos','vwEvento')->name('vwEvento')->middleware('auth');
Route::view('MantenimientoCategoria','vwMantCategRiesgo')->name('vwMantCategRiesgo')->middleware('auth');
Route::view('MantenimientoAccion','vwMantAccionRiesgo')->name('vwMantAccionRiesgo')->middleware('auth');
Route::view('MantenimientoProbabilidad','vwMantProbabilidad')->name('vwMantProbabilidad')->middleware('auth');
Route::view('MantenimientoImpacto','vwMantImpacto')->name('vwMantImpacto')->middleware('auth');
Route::view('MantenimientoEstadosEvento','vwMantEstadosEvento')->name('vwMantEstadosEvento')->middleware('auth');
Route::view('MantenimientoUnidadMedida','vwMantUnidadMedida')->name('vwMantUnidadMedida')->middleware('auth');
Route::view('InicioSesion/','vwlogin')->name('login');

