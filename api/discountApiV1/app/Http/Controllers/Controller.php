<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function apiResponse($data = "", $message = "", $status = 200)
    {
        return response()->json([
            'success' => true,
            'data'      => $data,
            'message'   => $message,

        ], $status);
    }

    public function apiErrorResponse( $message = "", $status = 200)
    {
        return response()->json([
            'success' => false,
            'message'   => $message,
        ], $status);

    }
}
