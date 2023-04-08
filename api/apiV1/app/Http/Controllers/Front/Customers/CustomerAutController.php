<?php

namespace App\Http\Controllers\Front\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAutController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $customer = Customer::where('email', $credentials['email'])->first();

        if ( $customer && Hash::check($credentials['password'], $customer->password) ) {

            $token = $customer->createToken('CUSTOMER TOKEN')->plainTextToken;
            return response()->json(['token' => $token]);

        }
        return response()->json(['error' => 'Böyle bir kullanıcı bulunmuyor!'], 401);


    }

    public function logout()
    {

        $user = Auth::guard('customer-api')->user()->currentAccessToken()->delete();

        return response()->json(['success' => 'Çıkış Başarılı!'], 200);

    }


}
