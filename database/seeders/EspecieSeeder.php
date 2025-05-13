<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Especie;

class EspecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especie = [
            ['nombre_especie' => 'Perro'],
            ['nombre_especie' => 'Gato'],
            ['nombre_especie' => 'Loro'],
            ['nombre_especie' => 'Tortuga'],
            ['nombre_especie' => 'Conejo'],
        ];

        foreach ($especie as $especie) {
            Especie::create($especie);
        }
    }
}
