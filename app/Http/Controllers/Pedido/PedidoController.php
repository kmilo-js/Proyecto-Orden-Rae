<?php

namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Models\Pedido;
use App\Models\Producto;

use App\Models\Usuario;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::with(['productos', 'usuarios'])
        ->orderBy('ID_PEDIDO')
        ->get();
        return view('pedido.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pedido.create',[
        'pedido' => null,
        'productos'=> Producto::orderBy('ID_PRODUCTO')->get(['ID_PRODUCTO', 'Referencia_producto']),
        'usuarios' => Usuario::orderBy('ID_USUARIO')->get(['ID_USUARIO','Nombres','Apellidos']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(StorePedidoRequest $request)
{
    //  Crear el pedido
    $pedido = Pedido::create($request->validated());
    // Asignar usuario
    $pedido->usuarios()->sync([$request->ID_USUARIO]);
    // Guardar productos en la tabla pivote ✅
    $productosConCantidad = [];
    foreach ($request->productos as $item) {
        if (!empty($item['producto_id']) && !empty($item['cantidad'])) {
            $productosConCantidad[$item['producto_id']] = [
                'Cantidad_solicitada' => $item['cantidad']
            ];
        }
    }
    // Esto es clave: sync() guarda en la tabla pivote
    $pedido->productos()->sync($productosConCantidad);
    return redirect()->route('pedido.index')->with('ok', 'Pedido creado');
}
    /**
     * Display the specified resource.
     */// Cargar las relaciones para mostrar usuario y producto
    public function show(Pedido $pedido)
{
        $pedido->load(['usuarios', 'productos']);
        return view('pedido.show', compact('pedido'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        $pedido->load('productos');
        return view ('pedido.edit',[
        'pedido' => $pedido,
        'productos'=> Producto::orderBy('ID_PRODUCTO')->get(['ID_PRODUCTO', 'Referencia_producto']),
        'usuarios'   => Usuario::orderBy('ID_USUARIO')->get(['ID_USUARIO','Nombres','Apellidos']), 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
public function update(UpdatePedidoRequest $request, Pedido $pedido)
{
           //Actualizar campos del pedido
            $pedido->update($request->validated());
           //ojo Sincronizar el cliente (usuario)
            $pedido->usuarios()->sync([$request->ID_USUARIO]);
            //Preparar los productos con sus cantidades
            $productosConCantidad = [];
            foreach ($request->productos as $item) {
             // Asegurarse de que el producto exista y tenga cantidad
             if (!empty($item['producto_id']) && !empty($item['cantidad'])) {
            $productosConCantidad[$item['producto_id']] = [
                'Cantidad_solicitada' => $item['cantidad']
            ];
        }
    }
      //Sincronizar productos con datos de pivote
    $pedido->productos()->sync($productosConCantidad);
    return redirect()->route('pedido.index')->with('ok', 'Pedido actualizado');
}

    /**
     * Remove the specified resource from storage.
     */
 public function destroy(Pedido $pedido)
{
    try {
        // Primero elimina las relaciones (opcional, pero seguro)
        $pedido->productos()->detach();
        $pedido->usuarios()->detach();
        // Si `venta` tiene muchos registros

        // Luego elimina el pedido
        $pedido->delete();

        return back()->with('ok', 'Pedido eliminado');
    } catch (\Throwable $e) {
        return back()->withErrors('No se puede eliminar: tiene registros relacionados.');
    }
}
}