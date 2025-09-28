<?php

use App\Http\Controllers\Producto\ProductoController;
use App\Http\Controllers\Venta\VentaController;
use Illuminate\Support\Facades\Route;

//Página Principal
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('producto', ProductoController::class);
    Route::resource('venta', VentaController::class)->parameters([
    'venta' => 'venta'
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
