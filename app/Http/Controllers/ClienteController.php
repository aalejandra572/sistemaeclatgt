<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));

        $clientes = Cliente::buscar($search)
            ->orderByDesc('idcliente')
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('clientes.index', compact('clientes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'    => ['required', 'string', 'max:100'],
            'apellido'  => ['required', 'string', 'max:100'],
            'telefono'  => ['nullable', 'string', 'max:20'],
            'direccion' => ['nullable', 'string', 'max:255'],
        ]);

        Cliente::create($data);

        return redirect()
            ->route('clientes.index')
            ->with([
                'status'  => 'success',
                'message' => 'Cliente creado correctamente.',
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
    public function edit($idcliente)
    {
        $cliente = Cliente::findOrFail($idcliente);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idcliente)
    {
        $cliente = Cliente::findOrFail($idcliente);

        $data = $request->validate([
            'nombre'    => ['required', 'string', 'max:100'],
            'apellido'  => ['required', 'string', 'max:100'],
            'telefono'  => ['nullable', 'string', 'max:20'],
            'direccion' => ['nullable', 'string', 'max:255'],
        ]);

        $cliente->update($data);

        return redirect()
            ->route('clientes.index')
            ->with([
                'status'  => 'success',
                'message' => 'Cliente actualizado correctamente.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idcliente)
    {
        $cliente = Cliente::findOrFail($idcliente);
        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with([
                'status'  => 'success',
                'message' => 'Cliente eliminado correctamente.',
            ]);
    }
}
