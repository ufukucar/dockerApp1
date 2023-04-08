<?php

namespace App\Http\Controllers\Back\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ( $user && Hash::check($credentials['password'], $user->password) ) {

            $token = $user->createToken('ADMIN TOKEN')->plainTextToken;
            return response()->json(['token' => $token]);

        }
        return response()->json(['error' => 'Böyle bir admin bulunmuyor!'], 401);

    }

    public function logout()
    {
        $user = Auth::guard('admin-api')->user()->currentAccessToken()->delete();

        return response()->json(['success' => 'Çıkış Başarılı!'], 200);

    }
}
