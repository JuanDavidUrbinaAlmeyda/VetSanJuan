<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Presentacion;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregar(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $presentacion = null;
        
        if ($request->has('presentacion_id')) {
            $presentacion = Presentacion::findOrFail($request->presentacion_id);
        }

        $carrito = session()->get('carrito', []);
        
        $itemId = $presentacion ? $presentacion->id : $producto->id;
        $precio = $presentacion ? $presentacion->precio_unitario : $producto->precio;
        
        if (isset($carrito[$itemId])) {
            $carrito[$itemId]['cantidad']++;
        } else {
            $carrito[$itemId] = [
                'producto_id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $precio,
                'cantidad' => 1,
                'imagen' => is_array($producto->imagen) ? $producto->imagen[0] : $producto->imagen,
                'presentacion' => $presentacion ? $presentacion->nombre : null
            ];
        }
        
        session()->put('carrito', $carrito);
        
        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function mostrar()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito.mostrar', compact('carrito'));
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);
        
        if(isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }
        
        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }

    public function actualizar(Request $request, $id)
    {
        $carrito = session()->get('carrito', []);
        
        if(isset($carrito[$id])) {
            $carrito[$id]['cantidad'] = $request->cantidad;
            session()->put('carrito', $carrito);
        }
        
        return redirect()->back()->with('success', 'Carrito actualizado');
    }
}

