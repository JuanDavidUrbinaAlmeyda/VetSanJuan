<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MascotaController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::prefix('/products')->controller(ProductController::class)->group(function(){
    Route::get('/','shop')->name('shop');
    Route::get('/{id}','showProduct')->name('shop.producto');
});

Route::post('/citas/store', [CitasController::class, 'store'])->name('citas.store');
Route::post('/mascotas', [MascotaController::class, 'store'])->name('mascotas.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Rutas del perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas del carrito
    Route::prefix('carrito')->group(function () {
        Route::get('/', [CarritoController::class, 'index'])->name('carrito.index');
        Route::post('/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
        Route::delete('/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
        Route::patch('/{id}', [CarritoController::class, 'actualizar'])->name('carrito.actualizar');
        Route::post('/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');
    });

    // Rutas de pago
    Route::prefix('pago')->group(function () {
        // Add these payment routes
        Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
        Route::post('/pago/confirmar', [PagoController::class, 'confirmarPago'])->name('pago.confirmar');
    });
});

require __DIR__.'/auth.php';
