<?php

use App\Http\Controllers\Back\Admin\AdminAuthController;
use App\Http\Controllers\Back\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*** Admine ait route lar burada gösterilmektedir **/


Route::post('/admin/login',[AdminAuthController::class, 'login'])->name('admin.login');


Route::middleware(['auth:admin-api'])->prefix('admin')->name('admin.')->group(function(){

    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::post('/', [AdminController::class, 'index'])->name('index');





});

