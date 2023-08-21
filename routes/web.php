<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'Dashboard'])->name('dashboard');

    Route::get('/sucursales', [App\Http\Controllers\BranchController::class, 'listBranches'])->name('list.branch');
    Route::view('/sucursales/agregar-nueva', 'admin.branches.addBranch')->name('addNew.branch');
    Route::post('/sucursales-agregar', [App\Http\Controllers\BranchController::class, 'addBranches'])->name('add.branch');
    Route::get('/sucursales-activar/{id}', [App\Http\Controllers\BranchController::class, 'ActiveBranches'])->name('active.branch');

    Route::post('/venta-sin-cliente', [App\Http\Controllers\SaleController::class, 'SaleWithOutClient'])->name('sale.withOutClient');

    Route::get('/medios-pagos', [App\Http\Controllers\PaymentController::class, 'listPayment'])->name('list.payment');
    Route::view('/medios-pagos/agregar-nuevo', 'admin.payments.addPayment')->name('addNew.payment');
    Route::post('/medios-pagos/agregar', [App\Http\Controllers\PaymentController::class, 'addPayment'])->name('add.payment');
    Route::get('/medios-pagos/editar/{id}', [App\Http\Controllers\PaymentController::class, 'editPayment'])->name('edit.payment');
    Route::post('/medios-pagos/editado/{id}', [App\Http\Controllers\PaymentController::class, 'upgradePayment'])->name('upgrade.payment');
    Route::get('/medios-pagos/borrar/{id}', [App\Http\Controllers\PaymentController::class, 'deletePayment'])->name('delete.payment');

    Route::get('/barberos', [App\Http\Controllers\EmployeeController::class, 'listEmployee'])->name('list.employee');
    Route::get('/barberos/agregar-nuevo', [App\Http\Controllers\EmployeeController::class, 'addNewEmployee'])->name('addNew.employee');
    Route::post('/barberos/agregar', [App\Http\Controllers\EmployeeController::class, 'addEmployee'])->name('add.employee');
    Route::get('/barberos/editar/{id}', [App\Http\Controllers\EmployeeController::class, 'editEmployee'])->name('edit.employee');
    Route::post('/barberos/editado/{id}', [App\Http\Controllers\EmployeeController::class, 'upgradeEmployee'])->name('upgrade.employee');
    Route::get('/barberos/borrar/{id}', [App\Http\Controllers\EmployeeController::class, 'deleteEmployee'])->name('delete.employee');
});
