<?php

use Illuminate\Support\Facades\Route;

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

Route::get('InicioSesion/', function () {
    return view('vwlogin');
});

Route::get('evento/', function () {
    return view('procesos/vwEventoR');
});

Route::get('identificarriesgo/', function () {
    return view('procesos/vwIdentificar');
});
Route::get('MantUsuarios/', function () {
    return view('mantenimientos/vwMantUsuarios');
});

Route::get('MantCategoria/', function () {
    return view('mantenimientos/vwMantCategRiesgo');
});

Route::get('MantProcesoAfecta/', function () {
    return view('mantenimientos/vwMantProcesoAfecta');
});

Route::get('MantAccion/', function () {
    return view('mantenimientos/vwMantAccionRiesgo');
});

Route::get('MantProbabilidad/', function () {
    return view('mantenimientos/vwMantProbabilidad');
});

Route::get('MantImpacto/', function () {
    return view('mantenimientos/vwMantImpacto');
});

Route::get('MantEstadosEvento/', function () {
    return view('mantenimientos/vwMantEstadosEvento');
});

Route::get('MantUnidadMedida/', function () {
    return view('mantenimientos/vwMantUnidadMedida');
});

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


