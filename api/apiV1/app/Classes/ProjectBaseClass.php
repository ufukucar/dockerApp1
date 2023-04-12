<?php

namespace App\Classes;

class ProjectBaseClass
{

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
