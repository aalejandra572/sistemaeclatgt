<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));

        $categorias = Categoria::when($search !== '', function ($q) use ($search) {
                $q->where(function ($q2) use ($search) {
                    // PostgreSQL: case-insensitive
                    $q2->where('nombre', 'ilike', "%{$search}%")
                       ->orWhere('descripcion', 'ilike', "%{$search}%");
                });
            })
            ->orderByDesc('idcategoria')
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('categorias.index', compact('categorias', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.new');
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

        Categoria::create($data);

        return redirect()
            ->route('categorias.index')
            ->with([
                'status'  => 'success',
                'message' => 'Categoría creada correctamente.',
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
    public function edit($idcategoria)
    {
        $categoria = Categoria::findOrFail($idcategoria);
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idcategoria)
    {
        $categoria = Categoria::findOrFail($idcategoria);

        $data = $request->validate([
            'nombre'      => ['required', 'string', 'max:150'],
            'descripcion' => ['nullable', 'string', 'max:1000'],
        ]);

        $categoria->update($data);

        return redirect()
            ->route('categorias.index')
            ->with([
                'status'  => 'success',
                'message' => 'Categoría actualizada correctamente.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idcategoria)
    {
        $categoria = Categoria::findOrFail($idcategoria);
        $categoria->delete();

        return redirect()
            ->route('categorias.index')
            ->with([
                'status'  => 'success',
                'message' => 'Categoría eliminada correctamente.',
            ]);
    }
}
