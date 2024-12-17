<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class CheckPermission
{
   /**
     * Manejar la solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        $user = Auth::user();

        if (!$user || !$user->hasPermission($permission)) {
            return abort(403, 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}
