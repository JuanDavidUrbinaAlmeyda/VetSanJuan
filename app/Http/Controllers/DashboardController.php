<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mascotas;
use App\Models\veterinarios;

class DashboardController extends Controller
{


    public function index()
    {
        $user = Auth::user();

        // Asegúrate que el usuario tenga un cliente relacionado
        $cliente = $user->cliente;
        $veterinarios = veterinarios::all();

        if (!$cliente) {
            return redirect()->back()->with('error', 'No se encontró un perfil de cliente asociado a este usuario.');
        }

        $mascotas = $cliente->mascotas()->with(['especie', 'raza', 'sexo', 'color', 'tamano'])->get();
        $citas = $cliente->citas()
            ->with(['mascota', 'veterinario', 'servicios'])
            ->get();

        return view('dashboard', compact('user', 'cliente', 'mascotas', 'citas','veterinarios'));
    }
}
