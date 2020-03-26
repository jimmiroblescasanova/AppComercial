<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

// Login para usuarios normales
Route::namespace('Auth')->group(function () {
    Route::get('/login', 'LoginController@login')->name('login');
    Route::post('/validate', 'LoginController@validateLogin')->name('validate');
    Route::post('/logout', 'LoginController@logout')->name('logout');

    Route::get('/registro', 'RegisterController@index')->name('register');
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

    Route::get('/usuarios', 'UsersController@index')->name('users');
});
