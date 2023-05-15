<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormatoController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\EntregaSstController;

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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::get('/home', 'Controller@index')->name('home.home');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * Routes Sidebar
         */
        Route::get('/Formato', 'FormatoController@index')->name('formato');
        Route::get('/Compras/solicitudRQS', 'ComprasController@index')->name('compras.solicitud');
        Route::get('/Compras/dashboard', 'ComprasController@dashboardRQS')->name('compras.dashboard');
        Route::get('/Compras/detalle', 'ComprasController@detalleRQS')->name('compras.detalle_rqs');

        /**
         * Routes Formato
         */
        Route::get('/firma', 'FormatoController@firma')->name('firma');
        Route::post('/formato/crear', 'FormatoController@GuardarFormato')->name('formato.insertar');
        Route::get('/formato/prueba', 'FormatoController@create')->name('formato.listar');
        Route::get('/formato/datatable', 'FormatoController@datatable')->name('formato.data');
        Route::get('/formato/editar/{id}/', 'FormatoController@EditFormat');
        Route::post('/formato/update', 'FormatoController@UpdateFormat')->name('formato.update');

        /*
         * Routes Compras
         */
        Route::post('/Compras/solicitudRQS/insertar', 'ComprasController@solicitudRQS')->name('compras.solicitarrqs');
        Route::get('/Compras/dashboard/datatable', 'ComprasController@datatable')->name('compras.data');
        Route::post('/Compras/dashboard/{id}/detalle/', 'ComprasController@estado_RQS')->name('compras.estado');
        Route::post('/Compras/dashboard/detalle/{id}', 'ComprasController@gestion_RQS')->name('compras.gestion');
        Route::get('/Compras/dashboard/detalle/{id}/', 'ComprasController@show')->name('compras.show');
        Route::post('/Compras/dashboard/detalle/{id}/update', 'ComprasController@update_RQS')->name('compras.update');

        //Route::get('/inactivate-records', 'ComprasController@inactivateRecords');

        /*
        * Routes SST
        */
        Route::get('/sst', 'EntregaSstController@index')->name('sst');
        Route::get('/sst/select', 'EntregaSstController@select2')->name('sst.select');
        Route::get('/sst/datatable', 'EntregaSstController@datatable')->name('sst.data');
        Route::post('/sst/create', 'EntregaSstController@create')->name('sst.create');




    });
});
