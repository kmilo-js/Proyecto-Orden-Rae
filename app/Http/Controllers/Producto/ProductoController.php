<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Usuario;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['categoria', 'usuario'])
            ->orderBy('ID_PRODUCTO')
            ->get();
        return view('producto.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::where('Estado_categoria', 'activo')
            ->orderBy('Nombre_categoria')
            ->get(['ID_CATEGORIA', 'Nombre_categoria']);

        $usuarios = Usuario::select('ID_USUARIO', 'Nombres', 'Apellidos')->get();

        return view('producto.create', compact('categorias', 'usuarios'));
    }

    public function store(StoreProductoRequest $request)
    {
        // Agregar timestamps manualmente porque $timestamps = false
        $data = $request->validated();
        $data['Created_at'] = now();
        $data['Updated_at'] = now();

        Producto::create($data);

        return redirect()->route('producto.index')->with('ok', 'Producto creado exitosamente.');
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::where('Estado_categoria', 'activo')
            ->orderBy('Nombre_categoria')
            ->get(['ID_CATEGORIA', 'Nombre_categoria']);

        $usuarios = Usuario::select('ID_USUARIO', 'Nombres', 'Apellidos')->get();

        return view('producto.edit', compact('producto', 'categorias', 'usuarios'));
    }

    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $data = $request->validated();
        $data['Updated_at'] = now();

        $producto->update($data);

        return redirect()->route('producto.index')->with('ok', 'Producto actualizado exitosamente.');
    }

    public function destroy(Producto $producto)
    {
        try {
            $producto->delete();
            return back()->with('ok', 'Producto eliminado.');
        } catch (\Throwable $e) {
            return back()->withErrors('No se puede eliminar: tiene registros relacionados.');
        }
    }
}