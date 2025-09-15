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
        $usuario = Usuario::with(['Role','Inventario', 'Fidelizacion','Produccion','Producto','soportepago','Pedido','ventahasusuario'])
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
        $usuario = Usuario::with(['Role','Inventario','Fidelizacion','Produccion','Producto','SoportePago','Pedido','VentaHasUsuario'])
        ->orderBy('Nombres')->get();

        // Traer productos e inventarios normalmente
        $inventario = Inventario::orderBy('Referencia_producto')
            ->get(['ID_INVENTARIO','Referencia_producto']);

        $productos = Producto::orderBy('Referencia_producto')
            ->get(['ID_PRODUCTO','Referencia_producto','Categoria_producto']);

        return view('usuario.create', [
            'usuarios' => $usuario,
            'inventario' => $inventario,
            'productos' => $productos,
        ]);
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Usuario::create($request->validated());
        return redirect()->route('usuario.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
            return view('usuario.edit',[
            'usuario' => $usuario,
            'inventario' => Inventario::orderBy('Referencia_producto')->get(['ID_INVENTARIO','Referencia_producto']),
            'usuarios' => Usuario::orderBy('Nombres')->get(['ID_USUARIO','Nombres','Apellidos']),
            'productos' => Producto::orderBy('Referencia_producto')->get(['ID_PRODUCTO','Referencia_producto','Categoria_producto']),
        ]);
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
