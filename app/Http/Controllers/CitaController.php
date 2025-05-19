<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;
use App\Models\CitaServicio;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'mascota_id' => 'required|exists:mascotas,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'veterinario_id' => 'required|exists:veterinarios,id',
            'servicio_id' => 'required|exists:servicios,id',
        ]);

        $clienteId = Auth::user()->cliente->id;

        // Verificar si ya hay una cita en esa fecha/hora
        $existe = Citas::where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->where('veterinario_id', $request->veterinario_id)
            ->exists();

        if ($existe) {
            return back()->with('error', 'Esa hora ya está ocupada con ese veterinario.');
        }

        // Crear cita
        $cita = Citas::create([
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'cliente_id' => $clienteId,
            'mascota_id' => $request->mascota_id,
            'veterinario_id' => $request->veterinario_id,
        ]);

        // Relacionar con servicio
        CitaServicio::create([
            'cita_id' => $cita->id,
            'servicio_id' => $request->servicio_id,
        ]);

        return redirect()->back()->with('success', 'Cita creada correctamente.');
    }
}
