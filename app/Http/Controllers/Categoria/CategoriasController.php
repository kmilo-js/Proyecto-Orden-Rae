<?php

namespace App\Http\Controllers\Categoria;

use App\Http\Controllers\Controller;
use App\Models\Categorias;
use App\Http\Requests\StoreCategoriasRequest;
use App\Http\Requests\UpdateCategoriasRequest;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();
        return view('categoria.index', compact('categorias'));
    }

    public function create()
    {
        $categoria = new Categorias();
        return view('categoria.create', compact('categoria'));
    }

    public function store(StoreCategoriasRequest $request)
    {
        Categorias::create($request->validated());
        return redirect()->route('categoria.index')->with('success', 'Categoría creada exitosamente.');
    }

    public function edit(Categorias $categoria)
    {
        return view('categoria.edit', compact('categoria'));
    }

    public function update(UpdateCategoriasRequest $request, Categorias $categoria)
    {
        $categoria->update($request->validated());
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    public function destroy(Categorias $categoria)
    {
        try {
            $categoria->delete();
            return back()->with('Ok', 'Producto eliminado de produccion exitosamente.');
        } catch (\Throwable $e) {
            return back()->withErrors('No se puede eliminar el producto de produccion porque está relacionado con otros registros.');
        }
    }
}
