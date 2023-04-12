<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Discounts\DiscountController;


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/



// İndirim işlemleri
Route::prefix('discounts')->name('discounts')->group(function() {

    Route::post('/', [DiscountController::class, 'calculateDiscount'])->name('calculate.discount');

});
