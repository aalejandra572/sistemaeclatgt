<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));

        $marcas = Marca::when($search !== '', function ($q) use ($search) {
                $q->where(function ($q2) use ($search) {
                    // PostgreSQL: case-insensitive
                    $q2->where('nombre', 'ilike', "%{$search}%")
                       ->orWhere('descripcion', 'ilike', "%{$search}%");
                });
            })
            ->orderByDesc('idmarca')
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('marcas.index', compact('marcas', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marcas.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'      => ['required', 'string', 'max:150'],
            'descripcion' => ['nullable', 'string', 'max:1000'],
        ]);

        Marca::create($data);

        return redirect()
            ->route('marcas.index')
            ->with([
                'status'  => 'success',
                'message' => 'Marca creada correctamente.',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // opcional: si no usas show, puedes remover esta acción y excluirla en routes
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idmarca)
    {
        $marca = Marca::findOrFail($idmarca);
        return view('marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idmarca)
    {
        $marca = Marca::findOrFail($idmarca);

        $data = $request->validate([
            'nombre'      => ['required', 'string', 'max:150'],
            'descripcion' => ['nullable', 'string', 'max:1000'],
        ]);

        $marca->update($data);

        return redirect()
            ->route('marcas.index')
            ->with([
                'status'  => 'success',
                'message' => 'Marca actualizada correctamente.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idmarca)
    {
        $marca = Marca::findOrFail($idmarca);
        $marca->delete();

        return redirect()
            ->route('marcas.index')
            ->with([
                'status'  => 'success',
                'message' => 'Marca eliminada correctamente.',
            ]);
    }
}
