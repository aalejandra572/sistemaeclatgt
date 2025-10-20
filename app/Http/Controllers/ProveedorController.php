<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
        {
            $search = trim((string) $request->query('search', ''));

            $proveedores = Proveedor::when($search !== '', function ($q) use ($search) {
                    $q->where(function ($q2) use ($search) {
                        // PostgreSQL: búsqueda case-insensitive
                        $q2->where('nombre', 'ilike', "%{$search}%")
                        ->orWhere('contacto', 'ilike', "%{$search}%")
                        ->orWhere('correo', 'ilike', "%{$search}%")
                        ->orWhere('telefono', 'ilike', "%{$search}%")
                        ->orWhere('direccion', 'ilike', "%{$search}%");
                    });
                })
                ->orderByDesc('idproveedor')
                ->paginate(10)
                ->appends(['search' => $search]);

            return view('proveedores.index', compact('proveedores', 'search'));
        }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'    => ['required', 'string', 'max:150'],
            'contacto'  => ['nullable', 'string', 'max:150'],
            'telefono'  => ['nullable', 'string', 'max:30'],
            'correo'    => ['nullable', 'email', 'max:150'],
            'direccion' => ['nullable', 'string', 'max:255'],
        ]);

        Proveedor::create($data);

        return redirect()
            ->route('proveedores.index')
            ->with([
                'status'  => 'success',
                'message' => 'Proveedor creado correctamente.',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idproveedor)
    {
        $proveedor = Proveedor::findOrFail($idproveedor);
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idproveedor)
    {
        $proveedor = Proveedor::findOrFail($idproveedor);

        $data = $request->validate([
            'nombre'    => ['required', 'string', 'max:150'],
            'contacto'  => ['nullable', 'string', 'max:150'],
            'telefono'  => ['nullable', 'string', 'max:30'],
            'correo'    => ['nullable', 'email', 'max:150'],
            'direccion' => ['nullable', 'string', 'max:255'],
        ]);

        $proveedor->update($data);

        return redirect()
            ->route('proveedores.index')
            ->with([
                'status'  => 'success',
                'message' => 'Proveedor actualizado correctamente.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idproveedor)
    {
        $proveedor = Proveedor::findOrFail($idproveedor);
        $proveedor->delete();

        return redirect()
            ->route('proveedores.index')
            ->with([
                'status'  => 'success',
                'message' => 'Proveedor eliminado correctamente.',
            ]);
    }
}
