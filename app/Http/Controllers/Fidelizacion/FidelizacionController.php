<?php

namespace App\Http\Controllers\Fidelizacion;

use App\Http\Controllers\Controller;
use App\Models\Fidelizacion;
use Illuminate\Http\Request;

class FidelizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {           
        $fidelizacion = Fidelizacion::all();
        return view('fidelizacion.index', compact('fidelizacion'));    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fidelizacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fidelizacion $fidelizacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fidelizacion $fidelizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fidelizacion $fidelizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fidelizacion $fidelizacion)
    {
        //
    }
}
