<?php

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
    return view('dashboard.index');
});

Auth::routes();

//DASHBOARD

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/home', 'HomeController@index')->name('home');

//MODULO DE VOTANTES

Route::resource('/votantes', 'EndvotersController');

Route::put('/votantes/eliminar', 'EliminarVotantesController@update');

//ESTADOS DE LOS VOTANTES VALIDO=1 PENDIENTE=2 NULO=3 Y COMENTARIOS MEDIANTE AJAX

Route::get('/votos/estados', 'StatusEndvotersController@index');

Route::get('/estados/{id}','StatusEndvotersController@edit');

Route::put('/votos/estados/{id}', 'StatusEndvotersController@update');

Route::delete('/votos/estados/{id}', 'StatusEndvotersController@eliminar');

//FILTRAR VOTANTES CON AJAX

Route::post('/filajax/votantes', 'SearchAjaxController@searchEndvoters');

Route::post('/ajax/nominas', 'SearchAjaxController@searchNominas');

//FILTERS DAY MONTH YEARS

Route::get('/filtro/votantes/hoy', 'FiltersController@hoy');

Route::get('/filtro/votantes/mes', 'FiltersController@mes');

Route::get('/filtro/votantes/nulos', 'FiltersController@nulos');

//MODULO FINACIERA

Route::get('/financiera', 'NominaController@index');

Route::get('/financiera/pago', 'NominaController@create');

Route::post('/financiera/pago', 'NominaController@store');

Route::get('/financiera/pago/{id}', 'NominaController@edit');

Route::put('/financiera/pago/{id}', 'NominaController@update');

Route::get('/financiera/historial', 'NominaController@historial');

//GRAFICAS Y REPORTES (YANIER)
Route::get('/chart', 'ChartController@index');
//Route::get('generate-pdf','HomeController@generatePDF')->name('generate-pdf');
Route::get('reportes', 'pdfController@index')->name('generate-pdf');
//ERLYM
Route::get('reportes/{filtro}', 'pdfController@voters');

Route::get('/crearPDF/{tipo}', 'pdfController@crearPDF');