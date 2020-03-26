<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/validate', 'Auth\LoginController@validateLogin')->name('validate');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');

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

Route::get('/admin/login', 'AdminAuth\LoginController@login')->name('admin.login');
Route::post('/admin/validate', 'AdminAuth\LoginController@validateLogin')->name('admin.validate');
Route::post('/admin/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

Route::get('/admin/dashboard', 'DashboardController@index')->name('admin.dashboard');
