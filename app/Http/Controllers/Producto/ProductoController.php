<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Usuario;
use App\Models\Inventario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto = Producto::with(['Inventario','Usuario'])
        ->orderBy('ID_PRODUCTO')
        ->get();
        return view('producto.index', compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create',[
            'inventario' => Inventario::orderBy('ID_INVENTARIO')->get(['ID_INVENTARIO','Referencia_producto']),
            'usuarios' => Usuario::orderBy('ID_USUARIO')->get(['ID_USUARIO','Nombres','Apellidos']),
            'productos' => Producto::orderBy('Referencia_producto')->get(['ID_PRODUCTO','Referencia_producto','Categoria_producto']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductoRequest $request)
    {
        Producto::create($request->validated());
        return redirect()->route('producto.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('producto.edit',[
            'producto' => $producto,
            'inventario' => Inventario::orderBy('ID_INVENTARIO')->get(['ID_INVENTARIO','Referencia_producto']),
            'usuarios' => Usuario::orderBy('ID_USUARIO')->get(['ID_USUARIO','Nombres','Apellidos']),
            'productos' => Producto::orderBy('Referencia_producto')->get(['ID_PRODUCTO','Referencia_producto','Categoria_producto']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $producto->update($request->validated());
        return redirect()->route('producto.index')->with('success', 'Producto se actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        try {
            $producto->delete();
            return back()->with('success', 'Producto eliminado exitosamente'); 
            } 
        catch (\Throwable $prod){
            return back()->withErrors('No se puede eliminar: tiene registros relacionados');
            }
    }     
}

