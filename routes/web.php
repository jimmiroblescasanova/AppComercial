<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@index')->name('home');

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/validate', 'Auth\LoginController@validateLogin')->name('validate');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/registro', 'RegisterController@index')->name('register');

Route::get('/comisiones', 'ReporteComisionController@index')->name('comisiones.parametros');
Route::post('/comisiones', 'ReporteComisionController@reporte')->name('comisiones.reporte');
Route::get('/comisiones/export/{agente}/{fInicial}/{fFinal}', 'ReporteComisionController@export')->name('comisiones.export');

Route::get('/saldos', 'ReporteSaldosController@index')->name('saldos.parametros');
Route::post('/saldos', 'ReporteSaldosController@reporte')->name('saldos.reporte');
Route::get('/saldos/export/{agente}/{fecha}', 'ReporteSaldosController@export')->name('saldos.export');

Route::get('/documentos/{id}', 'DocumentosController@ver')->name('documentos.ver');
Route::get('/documentos/export/{id}', 'DocumentosController@export')->name('documentos.export');

Route::get('/usuarios', 'UsersController@index')->name('users.index');
