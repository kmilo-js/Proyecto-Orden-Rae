<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Producto\ProductoController;
use App\Models\Producto;

use App\Http\Controllers\Inventario\InventarioController;
use App\Models\Inventario;

use App\Http\Controllers\Fidelizacion\FidelizacionController;
use App\Models\Fidelizacion;

use App\Http\Controllers\Usuario\UsuariosController;
use App\Models\Usuario;

use App\Http\Controllers\Produccion\ProduccionController;
use App\Models\Produccion;

use App\Http\Controllers\Venta\VentaController;
use App\Models\Venta;

use App\Http\Controllers\Pedido\PedidoController;
use App\Models\Pedido;

use App\Http\Controllers\Categoria\CategoriasController;
use App\Models\Categorias;


use App\Http\Controllers\DashboardController;

//Pagina Principal
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('producto', ProductoController::class);
    Route::resource('venta', VentaController::class)->parameters([
    'venta' => 'venta'
    ]);
});

Route::get('/cotiza', function () {
    return view('pages.cotiza');
})->name('cotiza');

Route::get('/productos', function () {
    return view('pages.productos');
})->name('productos');

Route::get('/promociones', function () {
    return view('pages.promociones');
})->name('promociones');

Route::get('/recuperar', function () {
    return view('pages.recuperar');
})->name('recuperar');

Route::get('/quienes-somos', function () {
    return view('pages.quienessomos');
})->name('quienes.somos');

Route::get('/terminos-y-condiciones', function () {
    return view('pages.terminoscondiciones');
})->name('terminoscondiciones');

Route::get('/preguntas-frecuentes', function () {
    return view('pages.preguntasfrecuentes');
})->name('preguntasfrecuentes');

//Rutas de los controladores
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
->resource('producto', ProductoController::class)
->names('producto');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
->resource('inventario', InventarioController::class)
->names('inventario');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
->resource('fidelizacion', FidelizacionController::class)
->names('fidelizacion');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
->resource('usuario', UsuariosController::class)
->names('usuario');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
->resource('produccion', ProduccionController::class)
->names('produccion');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->resource('pedido',PedidoController::class)
->names('pedido');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->resource('categorias',CategoriasController::class)
->names('categorias');

//Ruta del dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
