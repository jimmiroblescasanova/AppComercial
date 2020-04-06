<?php

Route::post('/ajax/get-price/', 'PublicOrdersController@searchPrice')->name('ajax.price');
Route::post('/ajax/update-total/', 'AdminOrdersController@update_total')->name('ajax.updateTotal');
Route::post('/ajax/change-order-price/', 'AdminOrdersController@change_price')->name('ajax.changePrice');

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

    Route::get('/contacto', 'ContactController@create')->name('contact.create');
    Route::post('/contacto', 'ContactController@send')->name('contact.send');
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
        Route::get('/comisiones', 'ReporteComisionController@index')->name('reportes.comisiones.parametros');
        Route::post('/comisiones', 'ReporteComisionController@reporte')->name('reportes.comisiones.reporte');
        Route::get('/comisiones/export/{agente}/{fInicial}/{fFinal}', 'ReporteComisionController@export')->name('comisiones.export');

        Route::get('/saldos', 'ReporteSaldosController@index')->name('reportes.saldos.parametros');
        Route::post('/saldos', 'ReporteSaldosController@reporte')->name('reportes.saldos.reporte');
        Route::get('/saldos/export/{agente}/{fecha}', 'ReporteSaldosController@export')->name('saldos.export');

        Route::get('/documentos/{id}', 'ReporteDocumentosController@ver')->name('documentos.ver');
        Route::get('/documentos/export/{id}', 'ReporteDocumentosController@export')->name('documentos.export');
    });

    Route::prefix('pedidos')->group(function () {
        Route::get('/', 'AdminOrdersController@index')->name('orders.index');
        Route::get('/{id}/ver', 'AdminOrdersController@show')->name('orders.show');
        Route::get('/{id}/atender', 'AdminOrdersController@atenderOrden')->name('orders.atender');
        Route::get('/{id}/completar', 'AdminOrdersController@completarOrden')->name('orders.completar');
        Route::get('/{id}/cancelar', 'AdminOrdersController@cancelarOrden')->name('orders.cancelar');

    });

    Route::prefix('agentes')->group(function () {
        Route::get('/', 'AdminAgentsController@index')->name('agents.index');
        Route::get('/create', 'AdminAgentsController@create')->name('agents.create');
        Route::get('/{id}/editar', 'AdminAgentsController@edit')->name('agents.edit');
        Route::patch('/{id}/actualizar', 'AdminAgentsController@update')->name('agents.update');
        Route::post('/create', 'AdminAgentsController@store')->name('agents.store');
        Route::get('/suspender/{id}', 'AdminAgentsController@updateStatus')->name('agents.updateStatus');
    });

    Route::prefix('clientes')->group(function () {
        Route::get('/', 'UsersController@index')->name('users');
        Route::post('/agentAssoc', 'UsersController@agentAssoc')->name('users.agent-assoc');
        Route::get('/activate/{id}', 'UsersController@activate')->name('users.activate');
    });
});
