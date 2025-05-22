<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MascotaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre_mascota' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'especie_id' => 'required|exists:especie,id',
            'sexo_id' => 'required|exists:sexo,id',
            'edad' => 'required|numeric',
            'peso' => 'nullable|numeric',
            'vacunas' => 'nullable|string',
            'alergias' => 'nullable|string',
            'comentarios' => 'nullable|string',
            'foto' => 'nullable|string|url',
        ]);

        // Obtener el cliente asociado al usuario autenticado
        $cliente = Cliente::where('user_id', Auth::id())->first();

        if (!$cliente) {
            return redirect()->back()->with('error', 'No se encontró un perfil de cliente asociado a este usuario.');
        }

        $mascota = new Mascotas();
        $mascota->nombre_mascota = $request->nombre_mascota;
        $mascota->fecha_nacimiento = $request->fecha_nacimiento;
        $mascota->cliente_id = $cliente->id;
        $mascota->especie_id = $request->especie_id;
        $mascota->sexo_id = $request->sexo_id;
        $mascota->edad = $request->edad;
        $mascota->peso = $request->peso;
        $mascota->vacunas = $request->vacunas;
        $mascota->alergias = $request->alergias;
        $mascota->comentarios = $request->comentarios;
        $mascota->foto = $request->foto;
        
 

        $mascota->save();

        return redirect()->back()->with('success', 'Mascota registrada exitosamente');
    }
}