<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) : mixed
    {
        if ($request->key == config('app.api_key')) {
            return $next($request);
        } else
            throw new HttpResponseException(
                new Response(
                    json_encode(['error' => 'Token invalid or empty']),
                    403, [
                    'Content-Type' => 'applications/json'
                ])
            );
    }
}
