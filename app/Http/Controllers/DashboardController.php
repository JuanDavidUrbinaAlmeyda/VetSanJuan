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
        $cliente = $user->cliente;

        if (!$cliente) {
            return redirect()->back()->with('error', 'No se encontró un perfil de cliente asociado a este usuario.');
        }

        $mascotas = $cliente->mascotas()->with(['especie', 'sexo'])->get();
        $citas = $cliente->citas()->with(['mascota', 'veterinario', 'servicio'])->get();
        $veterinarios = veterinarios::all();

        return view('dashboard', compact('user', 'cliente', 'mascotas', 'citas', 'veterinarios'));
    }
}
