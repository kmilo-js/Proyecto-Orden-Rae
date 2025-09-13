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

Route::get('/', function () {
    return view('welcome');
});


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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
