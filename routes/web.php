<?php

use Illuminate\Support\Facades\Route;
use App\Models\Producto;
use App\Http\Controllers\Producto\ProductoController;

use App\Http\Controllers\Inventario\InventarioController;
use App\Models\Inventario;

use App\Http\Controllers\Fidelizacion\FidelizacionController;
use App\Models\Fidelizacion;

use App\Http\Controllers\Usuario\UsuariosController;
use App\Models\Usuario;

use App\Http\Controllers\Produccion\ProduccionController;
use App\Models\Produccion;

//Pagina Principal
Route::get('/', function () {
    return view('welcome');
});
// Rutas de las páginas
Route::get('/carro-compra', function () {
    return view('pages.carro_compra');
})->name('carro-compra');

Route::get('/contacto', function () {
    return view('pages.contacto');
})->name('contacto');

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

//Ruta del dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
