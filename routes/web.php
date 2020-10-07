<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Auth;

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

Auth::routes(['verify' => true]);

/*Rutas protegidas, grupo de rutas*/

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/vacante', 'VacanteController@index')->name('vacantes.index');
    Route::get('/vacante/create', 'VacanteController@create')->name('vacantes.create');
    Route::post('/vacante', 'VacanteController@store')->name('vacantes.store');
    Route::delete('/vacante/{vacante}', 'VacanteController@destroy')->name('vacante.destroy');
    Route::get('/vacante/{vacante}/edit', 'VacanteController@edit')->name('vacante.edit');
    Route::put('/vacante/{vacante}', 'VacanteController@update')->name('vacante.update');
    /*Ruta para subir las imagenes cargadas en el dropzone*/
    Route::post('/vacante/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
    Route::post('/vacante/borrarimagen', 'VacanteController@borrarimagen')->name('vacantes.borrar');
    /*Ruta para hacer el cambio del estatus de la vacante*/
    Route::post('/vacante/{vacante}', 'VacanteController@cambiaEstatusVacante')->name('vacantes.estatus');
    //Ruta para visualizar las notificaciones
    Route::get('/notificaciones', 'NotificacionesController')->name('notificaciones');
});

/*Ruta para acceder a la Página de Inicio*/
Route::get('/', 'InicioController')->name('inicio');

/*Ruta para realizar la busqueda de las vacantes en eñ formulario de buscar*/
Route::get('/busqueda/buscar', 'VacanteController@resultado')->name('vacante.resultado');
Route::post('/busqueda/buscar', 'VacanteController@buscar')->name('vacante.buscar');
/*Ruta para consultar las categorias*/
Route::get('/categorias/{categoria}', 'CategoriaController@show')->name('categorias.show');
/* Rutas que se pueden acceder sin autenticación */
Route::get('/vacante/{vacante}', 'VacanteController@show')->name('vacantes.show');
Route::post('/candidatos/store', 'CandidatoController@store')->name('candidatos.store');
Route::get('/candidatos/{id}', 'CandidatoController@index')->name('candidatos.index');
