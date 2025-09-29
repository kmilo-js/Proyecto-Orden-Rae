<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Producto;
use App\Models\Inventario;
use App\Models\Fidelizacion;
use App\Models\Produccion;
use App\Models\Pedido;
use App\Models\Categorias;

class DashboardController extends Controller
{
    public function index()
    {
        // Contar registros de cada tabla
        $counts = [
            'usuarios'     => Usuario::count(),
            'productos'    => Producto::count(),
            'inventario'   => Inventario::count(),
            'fidelizacion' => Fidelizacion::count(),
            'produccion'   => Produccion::count(),
            'pedidos'      => Pedido::count(),
            'categorias'   => Categorias::count(),
        ];

        // Retornar la vista dashboard.blade.php con la variable $counts
        return view('dashboard', compact('counts'));
    }
}
