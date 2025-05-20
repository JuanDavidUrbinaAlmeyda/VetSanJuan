<?php

namespace Database\Seeders;

use App\Models\Servicios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Servicios::create([
            'nombre' => 'Baño y Peluquería',
            'descripcion' => 'Limpieza general para tu mascota.',
        ]);
        Servicios::create([
            'nombre' => 'Consulta Veterinaria',
            'descripcion' => 'Consulta con un veterinario especializado.',
        ]);
        Servicios::create([
            'nombre' => 'Vacunación',
            'descripcion' => 'Vacunas para tu mascota.',
        ]);
    }
}
