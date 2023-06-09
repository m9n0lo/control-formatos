<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormatoController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\EntregaSstController;
use App\Http\Controllers\ArticulosSstController;
use App\Http\Controllers\InformesSstController;
use App\Http\Controllers\InventariosSstController;

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
        Route::get('/articulos', 'ArticulosSstController@index')->name('sst.articulos');
        Route::get('/Compras/solicitudRQS', 'ComprasController@index')->name('compras.solicitud');
        Route::get('/Compras/dashboard', 'ComprasController@dashboardRQS')->name('compras.dashboard');
        Route::get('/sst', 'EntregaSstController@index')->name('sst');
        Route::get('/inventario_sst/dashboard', 'InventariosSstController@dashboard')->name('sst.dashboard');
        Route::get('/sst/informes', 'InformesSstController@index')->name('sst.informes');
        Route::get('/sst/inventarios', 'InventariosSstController@index')->name('sst.inventarios');


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
        Route::get('/sst/select', 'EntregaSstController@select2')->name('sst.select');
        Route::get('/sst/select/history/{id}', 'EntregaSstController@show_persona')->name('sst.show');
        Route::post('/sst/articulosd/{id}', 'EntregaSstController@show_cantidad_d')->name('sst.show_c_d');
        Route::post('/sst/create', 'EntregaSstController@create')->name('sst.create');
        Route::get('/sst/datatable', 'EntregaSstController@datatable')->name('sst.datatable');



        /*
        * Routes SST Articulos
        */
        Route::post('/articulos/create', 'ArticulosSstController@create')->name('articulos.create');
        Route::post('/articulos/inactive', 'ArticulosSstController@update')->name('articulos.inactive');

        /*
        * Routes SST Informes
        */
        Route::post('/sst/informes/informe1', 'InformesSstController@show_informe_1')->name('informes.taesst');
        Route::post('/sst/informes/informe2', 'InformesSstController@show_informe_2')->name('informes.capsst');
        Route::post('/sst/informes/informe3', 'InformesSstController@show_informe_3')->name('informes.caesst');


        /*
        * Routes SST Inventarios
        */
        Route::post('/sst/inventarios/guardar', 'InventariosSstController@GuardarInventarioSst')->name('sst.guardar_inventarios');
        Route::get('/sst/inventarios/datatable', 'InventariosSstController@datatable_i')->name('sst.data_i');




    });
});
