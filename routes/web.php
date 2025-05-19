<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [App\Http\Controllers\ProductController::class, 'home'])->name('home');

Route::prefix('/products')->controller(ProductController::class)->group(function(){
    Route::get('/','shop')->name('shop');
    Route::get('/{id}','showProduct')->name('shop.producto');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('/carrito', [CarritoController::class, 'mostrar'])->name('carrito.mostrar');
Route::delete('/carrito/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::patch('/carrito/{id}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';
