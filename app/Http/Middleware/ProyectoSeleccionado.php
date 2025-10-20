<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProyectoSeleccionado
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('proyecto_clave') || !session()->has('proyecto_numero')) {
            return redirect()->route('proyecto.asignado');
        }

        return $next($request);
    }

}
