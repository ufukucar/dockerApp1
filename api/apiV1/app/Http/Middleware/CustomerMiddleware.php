<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $apiToken = $request->header('Authorization');
        if (!$apiToken || $apiToken !== config('services.api_token')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
