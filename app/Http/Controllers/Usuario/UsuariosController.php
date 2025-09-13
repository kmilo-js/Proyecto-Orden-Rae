<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = Usuario::with(['Role','Inventarios', 'Fidelizacions','Produccions','Productos','soporte_pagos','Pedidos','venta_has_usuarios'])
        ->orderBy('ID_USUARIO')
        ->get();
        return view('usuario.index', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Traer todos los usuarios con sus relaciones cargadas
        $usuarios = Usuario::with([
            'Role',
            'Inventario',
            'Fidelizacion',
            'Produccion',
            'Producto',
            'SoportePago',
            'Pedido',
            'VentaHasUsuario'
        ])->orderBy('Nombres')->get();

        // Traer productos e inventarios normalmente
        $inventarios = Inventario::orderBy('Referencia_producto')
            ->get(['ID_INVENTARIO','Referencia_producto']);

        $productos = Producto::orderBy('Referencia_producto')
            ->get(['ID_PRODUCTO','Referencia_producto','Categoria_producto']);

        return view('usuario.create', [
            'usuarios' => $usuarios,
            'inventarios' => $inventarios,
            'productos' => $productos,
        ]);
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
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
