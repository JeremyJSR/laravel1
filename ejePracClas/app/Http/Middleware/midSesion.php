<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class midSesion
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
        if (session()->has('usuario')) {
            return $next($request);
        } else {
            return response()->view('welcome',['mensaje'=>'Debes validarte antes de acceder a la aplicación.']);
        }
    }
}
