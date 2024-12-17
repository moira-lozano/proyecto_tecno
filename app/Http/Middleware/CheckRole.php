<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;
class CheckRole
{
   /**
     * Manejar la solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check() || !in_array(Auth::user()->rol, $roles)) {
            return abort(403, 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}
