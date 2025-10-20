<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Conteos
        $countClientes    = DB::table('sistema.cliente')->count();
        $countMarcas      = DB::table('sistema.marca')->count();
        $countProductos   = DB::table('sistema.producto')->count();
        $countUsuarios    = DB::table('users')->count(); // cambia a 'usuarios' si tu tabla se llama así
        $countProveedores = DB::table('sistema.proveedor')->count();
        $countCategorias  = DB::table('sistema.categoria')->count();

        // Totales (suma de todos los registros)
        $totalCompras = (float) DB::table('sistema.compra')->sum('totalcompra'); // ajusta nombres si difieren
        $totalVentas  = (float) DB::table('sistema.venta')->sum('totalventa');

        return view('dashboard', compact(
            'countClientes',
            'countMarcas',
            'countProductos',
            'countUsuarios',
            'countProveedores',
            'countCategorias',
            'totalCompras',
            'totalVentas'
        ));
    }
}
