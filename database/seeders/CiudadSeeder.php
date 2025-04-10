<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ciudad;

class CiudadSeeder extends Seeder
{
    public function run()
    {
        $ciudades = [
            ['nombre_ciudad' => 'Lima', 'departamento_id' => 1],
            ['nombre_ciudad' => 'Arequipa', 'departamento_id' => 2],
            ['nombre_ciudad' => 'Cusco', 'departamento_id' => 3],
            ['nombre_ciudad' => 'Piura', 'departamento_id' => 4],
            ['nombre_ciudad' => 'Huancayo', 'departamento_id' => 5],
        ];

        foreach ($ciudades as $ciudad) {
            Ciudad::create($ciudad);
        }
    }
}
