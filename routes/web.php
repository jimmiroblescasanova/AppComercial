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

    Route::get('/forgot-password', 'ForgotPasswordController@forgot')->name('password.forgot');
    Route::post('/forgot-password', 'ForgotPasswordController@validateEmail')->name('password.validate-email');
    Route::get('/reset-password/{token}', 'ResetPasswordController@reset')->name('password.reset');
    Route::post('/reset-password/{token}', 'ResetPasswordController@newPassword')->name('password.new-password');
});

// Panel de clientes
Route::prefix('clientes')->group(function () {
    Route::get('/', 'HomeController@index')->name('clients.home');
    Route::get('/edit', 'UsersController@edit')->name('clients.edit');
    Route::patch('/update', 'UsersController@update')->name('clients.update');

    // Rutas para los pedidos
    Route::get('/pedidos', 'PublicOrdersController@index')->name('clients.order.index');
    Route::get('/pedidos/crear', 'PublicOrdersController@create')->name('clients.order.create');
    Route::post('/pedidos/crear', 'PublicOrdersController@store')->name('clients.order.store');
    Route::get('/pedidos/{id}/show', 'PublicOrdersController@show')->name('clients.order.show');
    Route::get('/pedidos/{id}/cancel', 'PublicOrdersController@cancel')->name('clients.order.cancel');

    Route::get('/contacto', 'ContactController@create')->name('clients.contact.create');
    Route::post('/contacto', 'ContactController@send')->name('clients.contact.send');
});

// Rutas establecidas para el panel de admin
Route::prefix('admin')->group(function () {
    // Login para usuarios admin
    Route::namespace('AdminAuth')->group(function () {
        Route::get('/login', 'LoginController@login')->name('admin.login');
        Route::post('/validate', 'LoginController@validateLogin')->name('admin.validate');
        Route::post('/logout', 'LoginController@logout')->name('admin.logout');
    });

    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');

    // Rutas para los reportes
    Route::prefix('reportes')->group(function () {
        Route::get('/comisiones', 'ReporteComisionController@index')->name('admin.reportes.comisiones.parametros');
        Route::post('/comisiones', 'ReporteComisionController@reporte')->name('admin.reportes.comisiones.reporte');
        Route::get('/comisiones/export/{agente}/{fInicial}/{fFinal}', 'ReporteComisionController@export')->name('admin.comisiones.export');

        Route::get('/saldos', 'ReporteSaldosController@index')->name('admin.reportes.saldos.parametros');
        Route::post('/saldos', 'ReporteSaldosController@reporte')->name('admin.reportes.saldos.reporte');
        Route::get('/saldos/export/{agente}/{fecha}', 'ReporteSaldosController@export')->name('admin.saldos.export');

        Route::get('/documentos/{id}', 'ReporteDocumentosController@ver')->name('admin.documentos.ver');
        Route::get('/documentos/export/{id}', 'ReporteDocumentosController@export')->name('admin.documentos.export');
    });

    Route::prefix('pedidos')->group(function () {
        Route::get('/', 'AdminOrdersController@index')->name('admin.orders.index');
        Route::get('/{id}/ver', 'AdminOrdersController@show')->name('admin.orders.show');
        Route::get('/{id}/atender', 'AdminOrdersController@atenderOrden')->name('admin.orders.atender');
        Route::get('/{id}/completar', 'AdminOrdersController@completarOrden')->name('admin.orders.completar');
        Route::get('/{id}/cancelar', 'AdminOrdersController@cancelarOrden')->name('admin.orders.cancelar');
        Route::get('/{id}/print', 'AdminOrdersController@print')->name('admin.orders.print');

    });

    Route::prefix('agentes')->group(function () {
        Route::get('/', 'AdminAgentsController@index')->name('admin.agents.index');
        Route::get('/create', 'AdminAgentsController@create')->name('admin.agents.create');
        Route::get('/{id}/editar', 'AdminAgentsController@edit')->name('admin.agents.edit');
        Route::patch('/{id}/actualizar', 'AdminAgentsController@update')->name('admin.agents.update');
        Route::get('/{id}/password', 'AdminAgentsController@password')->name('admin.agents.password');
        Route::patch('/{id}/password', 'AdminAgentsController@change_password')->name('admin.agents.change-password');
        Route::post('/create', 'AdminAgentsController@store')->name('admin.agents.store');
        Route::get('/suspender/{id}', 'AdminAgentsController@updateStatus')->name('admin.agents.updateStatus');
    });

    Route::prefix('clientes')->group(function () {
        Route::get('/', 'UsersController@index')->name('admin.users');
        Route::post('/agentAssoc', 'UsersController@agentAssoc')->name('admin.users.agent-assoc');
        Route::get('/{id}/activate', 'UsersController@activate')->name('admin.users.activate');
        Route::post('/cambiar-lista-precios', 'UsersController@changePrice')->name('admin.users.changePrice');
    });
});
