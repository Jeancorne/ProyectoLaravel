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
        if (Auth::guard($guard)->check()) {
             $nombre = Auth::user()->name;
             if ($nombre == "Empresa") {
                return redirect('/Empresa_inicio');
             }else{
                if ($nombre == "Aprendiz") {
                    return redirect('/Inicio_aprendiz');
                }
             }

              
              print_r($user_id);  
            
        }

        return $next($request);
    }
}
