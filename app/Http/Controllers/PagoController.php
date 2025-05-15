<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class PagoController extends Controller
{
    public function mostrarFormulario()
    {
        $carrito = Session::get('carrito', []);
        return view('pago', compact('carrito'));
    }

    public function confirmarPago(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string',
            'direccion' => 'required|string',
            'telefono' => 'required|string',
            'metodo_pago' => 'required|string',
        ]);

        $carrito = Session::get('carrito', []);
        $total = $request->input('total');

        // Guardar en historial (ejemplo)
        $historial = Session::get('historial', []);
        $historial[] = [
            'productos' => $carrito,
            'datos_cliente' => $datos,
            'total' => $total,
            'fecha' => now(),
        ];
        Session::put('historial', $historial);

        // Limpiar carrito
        Session::forget('carrito');

        return redirect()->route('home')->with('success', '¡Compra realizada con éxito!');
    }
}
