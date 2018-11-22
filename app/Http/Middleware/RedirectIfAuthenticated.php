<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::check() || Auth::user()->user_type_id != 1) {
            // Redirecionar para tela de VOCÊ NÃO TEM PERMISSÃO
            return redirect('/login');
        } else {
            return $next($request);
        }
    }
}
