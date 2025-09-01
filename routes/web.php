<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Productos\ProductoController;   

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
->resource('producto', ProductoController::class)
->names('producto');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
