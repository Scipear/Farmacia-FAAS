<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerificarRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();
        $rol = $user->rol;
        
        $rol_usuario = mb_strtolower(trim($user->rol->nombre));
        $roles_permitidos = array_map(function ($rol){
            return mb_strtolower(trim($rol));
        }, $roles);

        if(!in_array($rol_usuario, $roles_permitidos)){
            abort(403, 'Acceso no autorizado.');
        }

        return $next($request);
    }
}
