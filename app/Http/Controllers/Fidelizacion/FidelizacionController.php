<?php

namespace App\Http\Controllers\Fidelizacion;

use App\Http\Controllers\Controller;
use App\Models\Fidelizacion;
use Illuminate\Http\Request;
use App\Models\Usuario;

class FidelizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {           
        $fidelizacion = Fidelizacion::with(['Usuario'])
        ->orderBy('ID_FIDELIZACION')
        ->get();
        return view('fidelizacion.index', compact('fidelizacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fidelizacion.create',[
            'fidelizacion' => Fidelizacion::orderBy('Fecha_de_fidelizacion')->get(['ID_FIDELIZACION','Fecha_de_fidelizacion']),
            'usuarios' => Usuario::orderBy('Nombres')->get(['ID_USUARIO','Nombres','Apellidos']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Fidelizacion::create($request->validated());
        return redirect()->route('fidelizacion.index')
        ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fidelizacion $fidelizacion)
    {
        return view('fidelizacion.show', compact('fidelizacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fidelizacion $fidelizacion)
    {
        return view('fidelizacion.edit',[
            'fidelizacion' => $fidelizacion,
            'usuarios' => Usuario::orderBy('Nombres')->get(['ID_USUARIO','Nombres','Apellidos']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fidelizacion $fidelizacion)
    {
        $fidelizacion->update($request->validated());
        return redirect()->route('fidelizacion.index')
        ->with('success', 'Fidelización se actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fidelizacion $fidelizacion)
    {
        try {
            $fidelizacion->delete();
            return back()->with('success', 'Registro eliminado exitosamente'); 
            } 
        catch (\Throwable $fidelizacion){
            return back()->withErrors('No se puede eliminar: tiene registros relacionados');
            }
    }
}
