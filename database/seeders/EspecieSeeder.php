<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $especies = [
            ['nombre' => 'Perro'],
            ['nombre' => 'Gato'],
            ['nombre' => 'Conejo'],
            ['nombre' => 'Hámster'],
            ['nombre' => 'Tortuga'],
            ['nombre' => 'Loro'],
            ['nombre' => 'Pez'],
            ['nombre' => 'Guepardo'],
            ['nombre' => 'León'],
            ['nombre' => 'Tigre'],
        ];

        foreach ($especies as $especie) {
            \App\Models\Especie::create($especie);
        }
    }
}
