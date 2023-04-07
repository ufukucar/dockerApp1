<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Front\Customers\CustomerController;

/*** Müşteriye ait route lar burada gösterilmektedir **/

Route::prefix('customers')->name('customer.')->group(function(){

    Route::get('/', [CustomerController::class, 'index'])->name('index');
})->middleware(['customermiddleware']);


