<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Models\Inventario;
use App\Models\Usuario;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInventarioRequest;
use App\Http\Requests\UpdateInventarioRequest;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventario = Inventario::with(['producto', 'usuario'])
            ->orderBy('ID_INVENTARIO')
            ->get();
        return view('inventario.index', compact('inventario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventario.create', [
            'inventario' => null,
            'usuarios' => Usuario::orderBy('ID_USUARIO')->get(['ID_USUARIO','Nombres','Apellidos']),
            'productos' => Producto::orderBy('Referencia_producto')->get(['ID_PRODUCTO','Referencia_producto'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInventarioRequest $request)
    {
        Inventario::create($request->validated());
        return redirect()->route('inventario.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventario $inventario)
    {
        return view('inventario.edit', [
            'inventario' => $inventario,
            'usuarios' => Usuario::orderBy('ID_USUARIO')->get(['ID_USUARIO','Nombres','Apellidos']),    
            'productos' => Producto::orderBy('Referencia_producto')->get(['ID_PRODUCTO','Referencia_producto'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInventarioRequest $request, Inventario $inventario)
    {
        $inventario->update($request->validated());
        return redirect()->route('inventario.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventario $inventario)
    {
        try {
            $inventario->delete();
            return back()->with('success', 'Producto eliminado exitosamente');
        } catch (\Throwable $e) {
            return back()->withErrors('No se puede eliminar: tiene registros relacionados');
        }
    }
}
