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
    return view('vwDashboard');
});

// Mantenimiento de usuarios
Route::get('MantUsuarios/',  [UsuariosController::class, 'index'], [UsuariosController::class, 'roles'])->middleware('auth');
Route::post('/MantUsuarios/store',  [UsuariosController::class, 'store'])->middleware('auth');
Route::get('/MantUsuarios/{id}',  [UsuariosController::class, 'show'])->middleware('auth');
Route::put('/MantUsuarios/update/{id}', [UsuariosController::class, 'update'])->middleware('auth');


//roles
Route::get('MantRoles/',  [RolController::class, 'index'])->middleware('auth');
Route::post('/MantRoles/store',  [RolController::class, 'store'])->middleware('auth');
Route::get('/MantRoles/{id}',  [RolController::class, 'show'])->middleware('auth');
Route::put('/MantRoles/update/{id}', [RolController::class, 'update'])->middleware('auth');

//probabilidad
Route::get('MantProbabilidad/', [ProbabilidadController::class, 'index'])->middleware('auth');
Route::post('/MantProbabilidad/store',  [ProbabilidadController::class, 'store'])->middleware('auth');
Route::get('/MantProbabilidad/{id}',  [ProbabilidadController::class, 'show'])->middleware('auth');
Route::put('/MantProbabilidad/update/{id}', [ProbabilidadController::class, 'update'])->middleware('auth');

//impacto
Route::get('MantImpacto/', [ImpactoController::class, 'index'])->middleware('auth');
Route::post('/MantImpacto/store',  [ImpactoController::class, 'store'])->middleware('auth');
Route::get('/MantImpacto/{id}',  [ImpactoController::class, 'show'])->middleware('auth');
Route::put('/MantImpacto/update/{id}', [ImpactoController::class, 'update'])->middleware('auth');

//categoria
Route::get('MantCategoria/', [CategoriaRiesgoController::class, 'index'])->middleware('auth');
Route::post('/MantCategoria/store',  [CategoriaRiesgoController::class, 'store'])->middleware('auth');
Route::get('/MantCategoria/{id}',  [CategoriaRiesgoController::class, 'show'])->middleware('auth');
Route::put('/MantCategoria/update/{id}', [CategoriaRiesgoController::class, 'update'])->middleware('auth');

//unidaddemedida
Route::get('MantUnidadMedida/', [UnidadMedidaController::class, 'index'])->middleware('auth');
Route::post('//MantUnidadMedida/store',  [UnidadMedidaController::class, 'store'])->middleware('auth');
Route::get('//MantUnidadMedida/{id}',  [UnidadMedidaController::class, 'show'])->middleware('auth');
Route::put('//MantUnidadMedida/update/{id}', [UnidadMedidaController::class, 'update'])->middleware('auth');

//MantEstadosEvento
Route::get('MantEstadosEvento/', [EstadoResolucionController::class, 'index'])->middleware('auth');
Route::post('/MantEstadosEvento/store',  [EstadoResolucionController::class, 'store'])->middleware('auth');
Route::get('/MantEstadosEvento/{id}',  [EstadoResolucionController::class, 'show'])->middleware('auth');
Route::put('/MantEstadosEvento/update/{id}', [EstadoResolucionController::class, 'update'])->middleware('auth');

//MantAccion
Route::get('MantAccion/', [AccionController::class, 'index'])->middleware('auth');
Route::post('/MantAccion/store',  [AccionController::class, 'store'])->middleware('auth');
Route::get('/MantAccion/{id}',  [AccionController::class, 'show'])->middleware('auth');
Route::put('/MantAccion/update/{id}', [AccionController::class, 'update'])->middleware('auth');

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



Route::get('evento/', function () {
    return view('procesos/vwEventoR');
})->middleware('auth');


   
Route::post('/login/verificar', [loginController::class, 'verificar']);
Route::post('/logout', [loginController::class, 'cerrar']);

Route::get('/ReporteUsuarios', [RegistroUsuarioController::class, 'inicio'])->middleware('auth');
Route::get('/ReportePDF', [PDFController::class, 'cargarBD'])->middleware('auth');


/*Route::get('MantUnidadMedida/', function () {
    return view('mantenimientos/vwMantUnidadMedida');
});*/

Route::view('Plantilla','vwMainTemplate')->name('vwMainTemplate');
Route::view('PanelPrincipal','vwDashboard')->name('vwDashboard');
Route::view('RegistrarEventos','vwEvento')->name('vwEvento')->middleware('auth');
Route::view('MantenimientoCategoria','vwMantCategRiesgo')->name('vwMantCategRiesgo')->middleware('auth');
Route::view('MantenimientoAccion','vwMantAccionRiesgo')->name('vwMantAccionRiesgo')->middleware('auth');
Route::view('MantenimientoProbabilidad','vwMantProbabilidad')->name('vwMantProbabilidad')->middleware('auth');
Route::view('MantenimientoImpacto','vwMantImpacto')->name('vwMantImpacto')->middleware('auth');
Route::view('MantenimientoEstadosEvento','vwMantEstadosEvento')->name('vwMantEstadosEvento')->middleware('auth');
Route::view('MantenimientoUnidadMedida','vwMantUnidadMedida')->name('vwMantUnidadMedida')->middleware('auth');
Route::view('InicioSesion/','vwlogin')->name('login');

