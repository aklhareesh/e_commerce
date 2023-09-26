<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $success_key = env('API_KEY');
        if ($request->header('Authorization') !== $success_key) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
