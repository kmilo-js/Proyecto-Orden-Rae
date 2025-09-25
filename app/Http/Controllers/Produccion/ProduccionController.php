<?php

namespace App\Http\Controllers\Produccion;

use App\Http\Controllers\Controller;
use App\Models\Produccion;
use App\Models\Producto;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduccionRequest;
use App\Http\Requests\UpdateProduccionRequest;


class ProduccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produccion = Produccion::with('usuario', 'producto')
        ->orderBy('ID_PRODUCCION')
        ->get();
        return view('produccion.index', compact('produccion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produccion.create', [
        'produccion' => null,
        'usuarios' => Usuario::orderBy('Nombres')->get(['ID_USUARIO', 'Nombres', 'Apellidos']),
        'productos' => Producto::orderBy('ID_PRODUCTO')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProduccionRequest $request)
    {

        Produccion::create($request->validated());  

        return redirect()
        ->route('produccion.index')
        ->with('Ok', 'Producto agregado a produccion exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produccion $produccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produccion $produccion)
    {
        return view('produccion.edit', [
            'produccion' => $produccion,
            'usuarios' => Usuario::orderBy('Nombres')->get(['ID_USUARIO', 'Nombres', 'Apellidos']),
            'productos' => Producto::orderBy('ID_PRODUCTO')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduccionRequest $request, Produccion $produccion)
    {
        $produccion->update($request->validated());

        return redirect()
        ->route('produccion.index')
        ->with('Ok', 'Producto en produccion actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produccion $produccion)
    {

        try {
            $produccion->delete();
            return back()->with('Ok', 'Producto eliminado de produccion exitosamente.');
        } catch (\Throwable $e) {
            return back()->withErrors('No se puede eliminar el producto de produccion porque está relacionado con otros registros.');
        }
    }
}