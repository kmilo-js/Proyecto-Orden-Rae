<?php

namespace App\Http\Controllers\Venta;

use App\Http\Controllers\Controller;
use App\Models\Venta;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Fidelizacion;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVentaRequest;
use App\Http\Requests\UpdateVentaRequest;

class VentaController extends Controller
{
    public function index()
    {
    /*$ventas = Venta::with(['cliente', 'pedido', 'fidelizacion'])->get();*/
    $ventas = Venta::with('cliente')->get(); // solo carga cliente
    
    return view('venta.index', compact('ventas'));
    }

    public function create()
    {
    $clientes = Cliente::all();
    $productos = Producto::all();
    return view('venta.create', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'cliente_id' => 'required|exists:cliente,ID_CLIENTE',
        'productos' => 'required|array|min:1',
        'productos.*.id' => 'required|exists:producto,ID_PRODUCTO',
        'productos.*.cantidad' => 'required|integer|min:1',
        'productos.*.precio' => 'required|numeric|min:0',
        'Fecha_venta' => 'nullable|date',
        'Total_venta' => 'required|numeric|min:0',
        'Estado_venta' => 'required|in:completada,pendiente,cancelada',
        'pedido_id' => 'nullable|exists:pedido,ID_PEDIDO', 
        'fidelizacion_id' => 'nullable|exists:fidelizacion,ID_FIDELIZACION',
    ]);

    // Crear venta
    $venta = Venta::create([
        'Fecha_venta' => $request->Fecha_venta ?? now(),
        'Total_venta' => $request->Total_venta, 
        'Estado_venta' => $request->Estado_venta,
        'pedido_id' => $request->pedido_id,
        'fidelizacion_id' => $request->fidelizacion_id,
        'cliente_id' => $request->cliente_id,
    ]);

    foreach ($request->productos as $item) {
        \App\Models\ProductoHasVentum::create([
            'ID_VENTA' => $venta->ID_VENTA,
            'ID_PRODUCTO' => $item['id'],
            'cantidad' => $item['cantidad'],
            'precio_unitario' => $item['precio']
        ]);
    }

    return redirect()->route('venta.index')->with('ok', 'Venta registrada con éxito.');
    }

    public function edit(Venta $venta)
    {
        $pedidos = Pedido::all();
        $fidelizaciones = Fidelizacion::all();
        $clientes = Cliente::all();
        $productos = Producto::all();

        return view('venta.edit', compact('venta', 'pedidos', 'fidelizaciones', 'clientes', 'productos'));
    }

    public function update(UpdateVentaRequest $request, Venta $venta)
    {
        $data = $request->validated();
        $data['updated_at'] = now();

        $venta->update($data);

        return redirect()->route('venta.index')->with('ok', 'Venta actualizada exitosamente.');
    }

    public function destroy(Venta $venta)
    {
        try {
            $venta->delete();
            return back()->with('ok', 'Venta eliminada.');
        } catch (\Throwable $e) {
            return back()->withErrors('No se puede eliminar: tiene registros relacionados.');
        }
    }
}