<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var \Illuminate\Contracts\Auth\Guard $auth */
        $auth = auth();
        if (!$auth->check() || $auth->user()->role !== 'admin') {
            abort(403, 'Acesso negado');
        }
        return $next($request);
    }
}
