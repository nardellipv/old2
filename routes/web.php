<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    return 'FINISHED';
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(["register" => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'Dashboard'])->name('dashboard');

    Route::get('/sucursales', [App\Http\Controllers\BranchController::class, 'listBranches'])->name('list.branch')->middleware('UserAdmin');
    Route::view('/sucursales/agregar-nueva', 'admin.branches.addBranch')->name('addNew.branch');
    Route::post('/sucursales-agregar', [App\Http\Controllers\BranchController::class, 'addBranches'])->name('add.branch');
    Route::get('/sucursales-activar/{id}', [App\Http\Controllers\BranchController::class, 'activeBranches'])->name('active.branch');
    Route::get('/sucursales/editar/{id}', [App\Http\Controllers\BranchController::class, 'editBranches'])->name('edit.branch');
    Route::post('/sucursales/editado/{id}', [App\Http\Controllers\BranchController::class, 'upgradeBranches'])->name('upgrade.branch');

    Route::post('/venta-sin-cliente', [App\Http\Controllers\SaleController::class, 'saleWithOutClient'])->name('sale.withOutClient');

    Route::post('/cliente-vender/{id}', [App\Http\Controllers\SaleController::class, 'saleClient'])->name('sale.client');

    Route::get('/cliente', [App\Http\Controllers\ClientController::class, 'listClient'])->name('list.client');
    Route::get('/perfil-cliente/{id}', [App\Http\Controllers\ClientController::class, 'profileClient'])->name('profile.client');
    Route::get('/cliente/agregar-nuevo', [App\Http\Controllers\ClientController::class, 'addNewClient'])->name('addNew.client');
    Route::post('/cliente/agregar', [App\Http\Controllers\ClientController::class, 'addClient'])->name('add.client');
    Route::get('/cliente/editar/{id}', [App\Http\Controllers\ClientController::class, 'editClient'])->name('edit.client');
    Route::post('/cliente/editado/{id}', [App\Http\Controllers\ClientController::class, 'upgradeClient'])->name('upgrade.client');
    Route::get('/cliente/eliminar/{id}', [App\Http\Controllers\ClientController::class, 'deleteClient'])->name('delete.client')->middleware('UserAdmin');

    Route::get('/producto', [App\Http\Controllers\ProductController::class, 'listProduct'])->name('list.product')->middleware('UserAdmin');
    Route::get('/producto/activar-exchange/{id}', [App\Http\Controllers\ProductController::class, 'activeExchangeProduct'])->name('activeExchange.product');
    Route::get('/producto/desactivar-exchange/{id}', [App\Http\Controllers\ProductController::class, 'desactiveExchangeProduct'])->name('desactiveExchange.product');
    Route::get('/producto/agregar-nuevo', [App\Http\Controllers\ProductController::class, 'addNewProduct'])->name('addNew.product')->middleware('UserAdmin');
    Route::post('/producto/agregar', [App\Http\Controllers\ProductController::class, 'addProduct'])->name('add.product');
    Route::get('/producto/editar/{id}', [App\Http\Controllers\ProductController::class, 'editProduct'])->name('edit.product');
    Route::post('/producto/editado/{id}', [App\Http\Controllers\ProductController::class, 'upgradeProduct'])->name('upgrade.product');
    Route::get('/producto/eliminar/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct'])->name('delete.product');

    Route::get('/medios-pagos', [App\Http\Controllers\PaymentController::class, 'listPayment'])->name('list.payment')->middleware('UserAdmin');
    Route::view('/medios-pagos/agregar-nuevo', 'admin.payments.addPayment')->name('addNew.payment');
    Route::post('/medios-pagos/agregar', [App\Http\Controllers\PaymentController::class, 'addPayment'])->name('add.payment');
    Route::get('/medios-pagos/editar/{id}', [App\Http\Controllers\PaymentController::class, 'editPayment'])->name('edit.payment');
    Route::post('/medios-pagos/editado/{id}', [App\Http\Controllers\PaymentController::class, 'upgradePayment'])->name('upgrade.payment')->middleware('UserAdmin');
    Route::get('/medios-pagos/borrar/{id}', [App\Http\Controllers\PaymentController::class, 'deletePayment'])->name('delete.payment')->middleware('UserAdmin');

    Route::get('/barberos', [App\Http\Controllers\EmployeeController::class, 'listEmployee'])->name('list.employee');
    Route::get('/barberos-perfil/{id}', [App\Http\Controllers\EmployeeController::class, 'profileEmployee'])->name('profile.employee');
    Route::get('/barberos/agregar-nuevo', [App\Http\Controllers\EmployeeController::class, 'addNewEmployee'])->name('addNew.employee');
    Route::post('/barberos/agregar', [App\Http\Controllers\EmployeeController::class, 'addEmployee'])->name('add.employee');
    Route::get('/barberos/editar/{id}', [App\Http\Controllers\EmployeeController::class, 'editEmployee'])->name('edit.employee');
    Route::post('/barberos/editado/{id}', [App\Http\Controllers\EmployeeController::class, 'upgradeEmployee'])->name('upgrade.employee');
    Route::get('/barberos/status', [App\Http\Controllers\EmployeeController::class, 'statusEmployee'])->name('status.employee');
    Route::get('/barberos/baja/{id}', [App\Http\Controllers\EmployeeController::class, 'downEmployee'])->name('down.employee');
    Route::get('/barberos/alta/{id}', [App\Http\Controllers\EmployeeController::class, 'upEmployee'])->name('up.employee');
    Route::get('/barberos/trabajos-historial/{id}', [App\Http\Controllers\EmployeeController::class, 'historialWorksEmployee'])->name('historialWorks.employee');
    Route::post('/barberos/pagos-pendientes/{id}', [App\Http\Controllers\EmployeeController::class, 'pendingWorksEmployee'])->name('pendingWorks.employee');
    Route::get('/barberos/cancelar-pagos/{id}', [App\Http\Controllers\EmployeeController::class, 'cancelWorksEmployee'])->name('cancelWorks.employee');
    Route::get('/barberos/pendientes-cancelar-pagos/{id}', [App\Http\Controllers\EmployeeController::class, 'pendingCancelWorksEmployee'])->name('pendingCancelWorks.employee');

    Route::get('/caja', [App\Http\Controllers\CashController::class, 'cashIndex'])->name('cash.index');
    Route::post('/caja/movimiento-dinero', [App\Http\Controllers\CashController::class, 'cashMove'])->name('cash.move');
    Route::get('/caja/recibo/{id}', [App\Http\Controllers\CashController::class, 'cashReceipt'])->name('cash.receipt');
    Route::get('/caja/movimientos-recibos', [App\Http\Controllers\CashController::class, 'receiptIndex'])->name('receipt.index');
    Route::get('/caja/movimientos-historicos', [App\Http\Controllers\CashController::class, 'historicMove'])->name('historic.move');
    Route::post('/caja/movimientos-filtro', [App\Http\Controllers\CashController::class, 'searchMove'])->name('search.move');
    Route::post('/caja/recibos-filtro', [App\Http\Controllers\CashController::class, 'searchReciveMove'])->name('searchRecive.move');

    Route::get('/perfil/listado', [App\Http\Controllers\UserController::class, 'listUser'])->name('user.list');
    Route::get('/perfil/nuevo-usuario', [App\Http\Controllers\UserController::class, 'addNewUser'])->name('addNew.user');
    Route::get('/perfil/{id}', [App\Http\Controllers\UserController::class, 'profileIndex'])->name('profile.index');
    Route::post('/perfil/addUser', [App\Http\Controllers\UserController::class, 'newUser'])->name('user.new');
    Route::post('/perfil/actualizar/{id}', [App\Http\Controllers\UserController::class, 'upgradeIndex'])->name('upgrade.index');

    Route::view('/error/error403', 'errors.403')->name('error.403');
});
