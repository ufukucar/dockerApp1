<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

    Route::get('/customers', function(\Illuminate\Http\Request $req) {

        $customers = \App\Models\Customer::all();

        return \App\Http\Resources\Back\Customers\CustomerResource::collection($customers);

        return response()->json([
            'customers' => $customers
        ], 200);

    } );
