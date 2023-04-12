<?php

use App\Http\Controllers\Back\Admin\AdminAuthController;
use App\Http\Controllers\Back\Admin\AdminController;
use App\Http\Controllers\Back\Orders\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*** Admine ait route lar burada gösterilmektedir **/


Route::post('/admin/login',[AdminAuthController::class, 'login'])->name('admin.login');


Route::middleware(['auth:admin-api'])->prefix('admin')->name('admin.')->group(function(){

    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::post('/', [AdminController::class, 'index'])->name('index');


    // Sipariş işlemleri
    Route::prefix('orders')->name('orders')->group(function() {

        Route::post('/', [OrderController::class, 'index'])->name('orders.list');
        Route::post('/store', [OrderController::class, 'store'])->name('orders.store');

    });


});

