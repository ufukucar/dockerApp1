<?php

use App\Http\Controllers\Front\Customers\CustomerAutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Front\Products\ProductController;

/*** Ürünlere ait route lar burada gösterilmektedir **/



Route::prefix('products')->name('products.')->group(function(){

    Route::post('/', [ProductController::class, 'index'])->name('index');


});


