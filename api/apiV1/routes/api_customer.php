<?php

use App\Http\Controllers\Front\Customers\CustomerAutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Front\Customers\CustomerController;

/*** Müşteriye ait route lar burada gösterilmektedir **/


Route::post('/customers/login',[CustomerAutController::class, 'login'])->name('customers.login');


Route::middleware('auth:customer-api')->prefix('customers')->name('customers.')->group(function(){


    Route::post('/logout', [CustomerAutController::class, 'logout'])->name('logout');

    Route::post('/', [CustomerController::class, 'index'])->name('index');





});


