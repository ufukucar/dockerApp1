<?php


use App\Http\Controllers\Front\Customers\CustomerAutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Front\Customers\CustomerController;
use \App\Http\Controllers\Front\Orders\OrderController;

/*** Müşteriye ait route lar burada gösterilmektedir **/

Route::post('/customers/login',[CustomerAutController::class, 'login'])->name('customers.login');


Route::middleware('auth:customer-api')->prefix('customers')->name('customers.')->group(function(){


    Route::post('/logout', [CustomerAutController::class, 'logout'])->name('logout');

    Route::post('/', [CustomerController::class, 'index'])->name('index');

    // Sipariş işlemleri
    Route::prefix('orders')->name('orders')->group(function() {

        Route::post('/', [OrderController::class, 'index'])->name('orders.list');
        Route::post('/store', [OrderController::class, 'store'])->name('orders.store');
        Route::post('/delete', [OrderController::class, 'destroy'])->name('orders.destroy');

    });



});


