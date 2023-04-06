<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Cache;
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

Route::get('/', function () {

    if ( Cache::has('ufuk') )  {
        echo "<br>Cache var: ". Cache::get('ufuk');
    }else {
        echo "<br> Cache yok, atama yapıldı. <br>";
        Cache::put('ufuk', 'ucar', 120);
    }

    echo "<br>Bitti<br>";

    return view('test');
});
