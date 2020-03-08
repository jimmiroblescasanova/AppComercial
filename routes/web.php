<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('home');
})->name('home');

Route::get('/comisiones', 'ReporteComisionController@index')->name('comisiones.parametros');
Route::post('/comisiones', 'ReporteComisionController@reporte')->name('comisiones.reporte');

Route::get('/saldos', 'ReporteSaldosController@index')->name('saldos.index');
Route::post('/saldos', 'ReporteSaldosController@reporte')->name('saldos.reporte');