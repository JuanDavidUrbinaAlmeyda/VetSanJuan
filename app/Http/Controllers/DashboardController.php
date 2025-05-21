<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mascotas;
use App\Models\Veterinario;
use App\Models\Peluquero;
use App\Models\Especie;
use App\Models\Sexo;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cliente = $user->cliente;
        $mascotas = $cliente->mascotas()->with(['especie', 'sexo'])->get();
        $citas = $cliente->citas()->with(['mascota', 'veterinario', 'servicio'])->get();
        $veterinarios = Veterinario::all();
        $especies = Especie::all();
        $sexos = Sexo::all();
        $peluqueros = Peluquero::all();

        return view('dashboard', compact(
            'user',
            'cliente',
            'mascotas',
            'citas',
            'veterinarios',
            'especies',
            'sexos',
            'peluqueros'
        ));
    }
}
