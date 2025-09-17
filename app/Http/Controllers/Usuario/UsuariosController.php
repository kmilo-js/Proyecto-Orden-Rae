<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\Role; // 

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = Usuario::with(['role', 'inventario', 'fidelizacion', 'produccion', 'producto', 'soportePago', 'pedido', 'ventahasusuario'])
        ->orderBy('ID_USUARIO')
        ->get();
        return view('usuario.index', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('Cargo')->get(); // ← Obtener roles

        $inventario = Inventario::orderBy('Referencia_producto')->get(['ID_INVENTARIO','Referencia_producto']);
        $productos = Producto::orderBy('Referencia_producto')->get(['ID_PRODUCTO','Referencia_producto','Categoria_producto']);

        return view('usuario.create', compact('roles', 'inventario', 'productos')); // ← Pasar $roles
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $data = $request->validated();
        $data['Contrase_usuario'] = 'no-login-required'; // O 'no-login' si no puedes cambiar la BD

        Usuario::create($data);

        return redirect()->route('usuario.index')->with('success', 'Usuario registrado exitosamente.');
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
            $roles = Role::orderBy('Cargo')->get(); // ← Obtener roles

            $inventario = Inventario::orderBy('Referencia_producto')->get(['ID_INVENTARIO','Referencia_producto']);
            $productos = Producto::orderBy('Referencia_producto')->get(['ID_PRODUCTO','Referencia_producto','Categoria_producto']);

            return view('usuario.edit', compact('usuario', 'roles', 'inventario', 'productos')); // ← Pasar $roles
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $data = $request->validated();
        $data['Contrase_usuario'] = $usuario->Contrase_usuario; // Mantener valor existente

        $usuario->update($data);

        return redirect()->route('usuario.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();
            return back()->with('success', 'Usuario eliminado exitosamente'); 
            } 
        catch (\Throwable $prod){
            return back()->withErrors('No se puede eliminar: tiene registros relacionados');
            }
    }
}
