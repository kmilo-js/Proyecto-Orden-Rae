<?php

namespace App\Http\Controllers\Productos;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'Referencia_producto' => 'required|max:100',
        'Categoria_producto' => 'required',
        'Color_producto' => 'required',
        'Cantidad_producto' => 'required|integer',
]);   
        Producto::create($request->all());
        return redirect()->route('producto.index')
        ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
        'Referencia_producto' => 'required|max:100',
        'Categoria_producto' => 'required',
        'Color_producto' => 'required',
        'Cantidad_producto' => 'required|integer',
    ]);
        $producto->update($request->all());
        return redirect()->route('producto.index')
        ->with('success', 'Producto se actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index')
        ->with('success', 'Producto eliminado exitosamente');
    }
}
