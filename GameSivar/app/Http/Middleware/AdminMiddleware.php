<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado y es un administrador
        if (Auth::check() && Auth::user()->isAdmin) {
            // Si es un administrador, permite que continúe la solicitud
            return $next($request);
        }

        // Si el usuario no es un administrador, redirige a una página de error o a otra parte de la aplicación
        return redirect()->route('home')->with('error', 'Acceso denegado. No tienes permisos de administrador.');
    }
}
