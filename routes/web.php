<?php

use Illuminate\Support\Facades\Route;

Route::post('/ajax/get-price/', 'PublicOrdersController@searchPrice')->name('ajax.price');

// Login para usuarios normales
Route::namespace('Auth')->group(function () {
    Route::get('/', 'LoginController@login')->name('login');
    Route::post('/validate', 'LoginController@validateLogin')->name('validate');
    Route::post('/logout', 'LoginController@logout')->name('logout');

    Route::get('/registro', 'RegisterController@create')->name('register');
    Route::post('/registro', 'RegisterController@store')->name('register.store');
});

// Panel de clientes
Route::prefix('clientes')->name('clients.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Rutas para los pedidos
    Route::get('/pedidos', 'PublicOrdersController@index')->name('order.index');
    Route::get('/pedidos/crear', 'PublicOrdersController@create')->name('order.create');
    Route::post('/pedidos/crear', 'PublicOrdersController@store')->name('order.store');
});

// Rutas establecidas para el panel de admin
Route::prefix('admin')->name('admin.')->group(function () {
    // Login para usuarios admin
    Route::namespace('AdminAuth')->group(function () {
        Route::get('/login', 'LoginController@login')->name('login');
        Route::post('/validate', 'LoginController@validateLogin')->name('validate');
        Route::post('/logout', 'LoginController@logout')->name('logout');
    });

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    // Rutas para los reportes
    Route::prefix('reportes')->group(function () {
        Route::get('/comisiones', 'ReporteComisionController@index')->name('comisiones.parametros');
        Route::post('/comisiones', 'ReporteComisionController@reporte')->name('comisiones.reporte');
        Route::get('/comisiones/export/{agente}/{fInicial}/{fFinal}', 'ReporteComisionController@export')->name('comisiones.export');

        Route::get('/saldos', 'ReporteSaldosController@index')->name('saldos.parametros');
        Route::post('/saldos', 'ReporteSaldosController@reporte')->name('saldos.reporte');
        Route::get('/saldos/export/{agente}/{fecha}', 'ReporteSaldosController@export')->name('saldos.export');

        Route::get('/documentos/{id}', 'DocumentosController@ver')->name('documentos.ver');
        Route::get('/documentos/export/{id}', 'DocumentosController@export')->name('documentos.export');
    });

    Route::prefix('pedidos')->group(function () {
        Route::get('/', 'PedidosController@index')->name('pedidos');
    });

    Route::prefix('agentes')->group(function () {
        Route::get('/', 'AdminAgentsController@index')->name('agents.index');
        Route::get('/create', 'AdminAgentsController@create')->name('agents.create');
        Route::post('/create', 'AdminAgentsController@store')->name('agents.store');
    });

    Route::prefix('clientes')->group(function () {
        Route::get('/', 'UsersController@index')->name('users');
        Route::get('/activate/{id}', 'UsersController@activate')->name('users.activate');
    });
});
