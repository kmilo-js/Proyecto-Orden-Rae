<?php

namespace App\Http\Controllers\Fidelizacion;

use App\Http\Controllers\Controller;
use App\Models\Fidelizacion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFidelizacionRequest;
use App\Http\Requests\UpdateFidelizacionRequest;

class FidelizacionController extends Controller
{
    public function index()
    {
        $fidelizacion = Fidelizacion::with(['usuario'])
            ->orderBy('ID_FIDELIZACION')
            ->get();
        return view('fidelizacion.index', compact('fidelizacion'));
    }

    public function create()
    {
        return view('fidelizacion.create', [
            'fidelizacion' => null,
            'usuarios' => Usuario::orderBy('ID_USUARIO')->get(['ID_USUARIO','Nombres','Apellidos']),
        ]);
    }

    public function store(StoreFidelizacionRequest $request)
    {
        Fidelizacion::create($request->validated());
        return redirect()->route('fidelizacion.index')->with('success', 'Registro de fidelización creado exitosamente.');
    }

    public function show(Fidelizacion $fidelizacion)
    {
        return view('fidelizacion.show', compact('fidelizacion'));
    }

    public function edit(Fidelizacion $fidelizacion)
    {
        return view('fidelizacion.edit', [
            'fidelizacion' => $fidelizacion,
            'usuarios' => Usuario::orderBy('ID_USUARIO')->get(['ID_USUARIO','Nombres','Apellidos']),
        ]);
    }

    public function update(UpdateFidelizacionRequest $request, Fidelizacion $fidelizacion)
    {
        $fidelizacion->update($request->validated());
        return redirect()->route('fidelizacion.index')->with('success', 'Registro de fidelización actualizado exitosamente.');
    }

    public function destroy(Fidelizacion $fidelizacion)
    {
        try {
            $fidelizacion->delete();
            return back()->with('success', 'Registro eliminado exitosamente');
        } catch (\Throwable $e) {
            return back()->withErrors('No se puede eliminar: tiene registros relacionados');
        }
    }
}