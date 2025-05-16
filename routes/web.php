<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\CarritoController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('/products')->controller(ProductController::class)->group(function(){
    Route::get('/','shop')->name('shop');
});

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del carrito
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/limpiar', [CarritoController::class, 'limpiar'])->name('carrito.limpiar');

// Rutas de pago
Route::get('/pago', [PagoController::class, 'mostrarFormulario'])->name('pago.formulario');
Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');
Route::get('/pago/confirmar', [PagoController::class, 'confirmar'])->name('pago.confirmar');

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    dd(auth()->user()->role); // Esto mostrará el rol actual
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/admin');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas
