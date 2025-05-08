<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ciudades;

class CiudadSeeder extends Seeder
{
    public function run()
    {
        $ciudades = [
            ['nombre_ciudad' => 'Bogotá', 'departamento_id' => 1],
            ['nombre_ciudad' => 'Medellín', 'departamento_id' => 2],
            ['nombre_ciudad' => 'Cali', 'departamento_id' => 3],
            ['nombre_ciudad' => 'Barranquilla', 'departamento_id' => 4],
            ['nombre_ciudad' => 'Bucaramanga', 'departamento_id' => 5],
        ];

        foreach ($ciudades as $ciudad) {
            Ciudades::create($ciudad);
        }
    }
}
