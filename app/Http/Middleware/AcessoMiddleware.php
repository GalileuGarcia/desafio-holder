<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('accept') !== "application/json") {
            return response()->json(['status' => 0,'mensagem' => 'A requisicao esta no formato incorreto. Utilize o formato: application/json'], 404);
        }
        return $next($request);
    }
}
