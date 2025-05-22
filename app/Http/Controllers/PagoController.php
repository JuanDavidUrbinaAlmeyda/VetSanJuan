<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Venta;
use App\Models\Pago;
use App\Models\Metodo;
use App\Models\Producto;
use Carbon\Carbon;


class PagoController extends Controller
{
    public function mostrarFormulario()
    {
        $carrito = Session::get('carrito', []);
        $metodos = Metodo::all();  // Traemos todos los métodos de pago

        return view('pago', compact('carrito', 'metodos'));
    }

    public function confirmarPago(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'direccion' => 'required|string',
            'telefono' => 'required|string',
            'metodo_pago' => 'required|exists:metodo,id', // o el campo que tengas para método
        ]);

        $carrito = Session::get('carrito', []);
        if (empty($carrito)) {
            return redirect()->back()->withErrors('El carrito está vacío.');
        }

        $user = Auth::user();
        $cliente = $user->cliente;
        if (!$cliente) {
            return redirect()->back()->withErrors('No se encontró cliente asociado al usuario.');
        }

        // Crear la venta
        $venta = new Venta();
        $venta->cliente_id = $cliente->id;
        $venta->fecha = Carbon::now()->toDateString();
        $venta->save();

        $totalPago = 0;

        // Guardar productos vendidos (venta_producto)
        foreach ($carrito as $item) {
            $producto = Producto::find($item['producto_id']);
            if (!$producto) {
                return redirect()->back()->withErrors("Producto {$item['nombre']} no encontrado.");
            }

            $cantidad = (int)$item['cantidad'];
            $subTotal = $producto->precio * $cantidad;

            $venta->productos()->attach($producto->id, [
                'cantidad' => $cantidad,
                'sub_total' => $subTotal,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $totalPago += $subTotal;
        }

        // Crear pago
        $pago = new Pago();
        $pago->metodo_id = $request->metodo_pago;
        $pago->venta_id = $venta->id;
        $pago->fecha_pago = Carbon::now()->toDateString();
        $pago->monto_pago = $totalPago;
        $pago->referencia_pago = null; // si tienes algo que enviar, úsalo aquí
        $pago->descuento_aplicado = 0; // o null si no hay descuento
        $pago->save();

        // Vaciar carrito y redirigir
        Session::forget('carrito');

        return redirect()->route('pago.exito')->with('success', 'Pago registrado con éxito.');
    }

    public function pagoExito()
    {
        session()->forget('carrito');
        return redirect('/')->with('success', '¡Pago realizado con éxito!');
    }

    public function pagoFallo()
    {
        return redirect('/')->with('error', 'El pago fue rechazado.');
    }

    public function pagoPendiente()
    {
        return redirect('/')->with('warning', 'El pago está pendiente de aprobación.');
    }
}
