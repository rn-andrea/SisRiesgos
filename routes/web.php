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
Route::get('MantUsuarios/',  [UsuariosController::class, 'index'], [UsuariosController::class, 'roles']);
Route::post('/MantUsuarios/store',  [UsuariosController::class, 'store']);
Route::get('/MantUsuarios/{id}',  [UsuariosController::class, 'show']);
Route::put('/MantUsuarios/update/{id}', [UsuariosController::class, 'update']);


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

Route::get('InicioSesion/', function () {
    return view('vwlogin');
});

Route::get('evento/', function () {
    return view('procesos/vwEventoR');
});

Route::get('identificarriesgo/', function () {
    return view('procesos/vwIdentificar');
});

   













/*Route::get('MantUnidadMedida/', function () {
    return view('mantenimientos/vwMantUnidadMedida');
});*/

Route::view('Plantilla','vwMainTemplate')->name('vwMainTemplate');
Route::view('PanelPrincipal','vwDashboard')->name('vwDashboard');
Route::view('IdentificarRiesgos','vwIdentificar')->name('vwIdentificar');
Route::view('RegistrarEventos','vwEvento')->name('vwEvento');
Route::view('MantenimientoCategoria','vwMantCategRiesgo')->name('vwMantCategRiesgo');
Route::view('MantenimientoAccion','vwMantAccionRiesgo')->name('vwMantAccionRiesgo');
Route::view('MantenimientoProbabilidad','vwMantProbabilidad')->name('vwMantProbabilidad');
Route::view('MantenimientoImpacto','vwMantImpacto')->name('vwMantImpacto');
Route::view('MantenimientoEstadosEvento','vwMantEstadosEvento')->name('vwMantEstadosEvento');
Route::view('MantenimientoUnidadMedida','vwMantUnidadMedida')->name('vwMantUnidadMedida');


