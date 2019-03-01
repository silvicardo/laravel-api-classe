<?php

namespace App\Http\Middleware;

use Closure;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //if (empty($request->header('Authorization'))) {
        if (!$request->hasHeader('Authorization')) {
            return response()->json([
                'error' => 'Manca l\'authorization'
            ]);
        }

        $apiKey = 'Bearer ' . config('app.api_key');

        if ($request->header('Authorization') != $apiKey) {
            return response()->json([
                'error' => 'Chiave sbagliata'
            ]);
        }

        return $next($request);
    }
}
