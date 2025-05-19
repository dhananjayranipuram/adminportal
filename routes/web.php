<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['admin'])->group(function () {

    Route::view('/dashboard', 'admin/dashboard');

    Route::view('/customers', 'admin/customers');
    Route::view('/add-customer', 'admin/add-customers');
    Route::get('/customer/edit/{id}', [DataController::class, 'editCustomerView']);

    Route::view('/invoice', 'admin/invoice');
    Route::view('/add-invoice', 'admin/add-invoice');
    Route::get('/invoice/edit/{id}', [DataController::class, 'editInvoiceView']);

    Route::any('/logout', [AuthController::class, 'logout']);
});

