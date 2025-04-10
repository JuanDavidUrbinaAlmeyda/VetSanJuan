<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $razas = [
            ['nombre' => 'Labrador', 'especie_id' => 1],
            ['nombre' => 'Bulldog', 'especie_id' => 1],
            ['nombre' => 'Persa', 'especie_id' => 2],
            ['nombre' => 'Siamés', 'especie_id' => 2],
            ['nombre' => 'Enano', 'especie_id' => 3],
            ['nombre' => 'Ruso', 'especie_id' => 4],
            ['nombre' => 'Aldabra', 'especie_id' => 5],
            ['nombre' => 'Amazonas', 'especie_id' => 6],
            ['nombre' => 'Betta', 'especie_id' => 7],
            ['nombre' => 'Cheetah', 'especie_id' => 8],
            ['nombre' => 'Panthera', 'especie_id' => 9],
            ['nombre' => 'Bengal Tiger', 'especie_id' => 10],
        ];

        foreach ($razas as $raza) {
            \App\Models\Raza::create($raza);
        }
    }
}
