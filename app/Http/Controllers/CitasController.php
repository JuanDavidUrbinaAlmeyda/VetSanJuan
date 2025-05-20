<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitasController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'mascota_id' => 'required|exists:mascotas,id',
            'veterinario_id' => 'required|exists:veterinarios,id',
            'tipo_servicio_id' => 'required|exists:servicios,id',
        ]);
    
        $cliente = Auth::user()->cliente;
    
        Citas::create([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'cliente_id' => $cliente->id,
            'mascota_id' => $request->mascota_id,
            'veterinario_id' => $request->veterinario_id,
            'tipo_servicio_id' => $request->tipo_servicio_id,
        ]);
    
        return redirect()->back()->with('success', 'Cita registrada correctamente.');
    }
    
}
