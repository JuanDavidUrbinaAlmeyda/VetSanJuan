<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Presentacion;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito.index', compact('carrito'));
    }
    public function agregar(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
            'presentacion_id' => 'nullable|exists:presentaciones,id'
        ]);

        $producto = Producto::findOrFail($id);
        $presentacion = null;
        
        if ($request->has('presentacion_id')) {
            $presentacion = Presentacion::findOrFail($request->presentacion_id);
            if ($presentacion->cantidad_inventario < $request->cantidad) {
                return redirect()->back()->with('error', 'Stock insuficiente para la presentación seleccionada');
            }
        } else {
            if ($producto->cantidad_inventario < $request->cantidad) {
                return redirect()->back()->with('error', 'Stock insuficiente');
            }
        }

        $carrito = session()->get('carrito', []);
        
        // Crear un ID único que combine producto y presentación
        $itemId = $request->has('presentacion_id') ? 
            "P{$producto->id}_PR{$request->presentacion_id}" : 
            "P{$producto->id}";
            
        $precio = $presentacion ? $presentacion->precio_unitario : $producto->precio;
        
        if (isset($carrito[$itemId])) {
            $nuevaCantidad = $carrito[$itemId]['cantidad'] + $request->cantidad;
            if ($presentacion && $nuevaCantidad > $presentacion->cantidad_inventario) {
                return redirect()->back()->with('error', 'La cantidad total excedería el stock disponible');
            }
            $carrito[$itemId]['cantidad'] = $nuevaCantidad;
        } else {
            $carrito[$itemId] = [
                'producto_id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $precio,
                'cantidad' => $request->cantidad,
                'imagen' => is_array($producto->imagen) ? $producto->imagen[0] : $producto->imagen,
                'presentacion' => $presentacion ? $presentacion->nombre : null,
                'presentacion_id' => $presentacion ? $presentacion->id : null,
                'stock_disponible' => $presentacion ? $presentacion->cantidad_inventario : $producto->cantidad_inventario
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
        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $carrito = session()->get('carrito', []);
        
        if (isset($carrito[$id])) {
            if ($request->cantidad > $carrito[$id]['stock_disponible']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cantidad excede el stock disponible'
                ]);
            }
            
            $carrito[$id]['cantidad'] = $request->cantidad;
            session()->put('carrito', $carrito);
            
            // Calcular el nuevo total del carrito
            $total = 0;
            foreach ($carrito as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
            
            return response()->json([
                'success' => true,
                'total' => number_format($total, 2)
            ]);
        }
        
        return response()->json([
            'success' => false,
            'message' => 'Producto no encontrado en el carrito'
        ]);
    }

    public function limpiar()
    {
        session()->forget('carrito');
        return redirect()->route('carrito.index')->with('success', 'Carrito vaciado correctamente');
    }
}

