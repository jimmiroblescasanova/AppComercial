<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/documentos', 'DocumentController@index');
Route::get('/agentes', 'HomeController@index')->name('agentes.index');
Route::post('/agentes', 'HomeController@reporteComisiones')->name('agentes.reporte');
