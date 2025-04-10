<?php

namespace Database\Seeders;

use App\Models\Tamano;
use Illuminate\Database\Seeder;

class TamanoSeeder extends Seeder
{
    public function run()
    {
        $tamaños = ['Pequeño', 'Mediano', 'Grande'];

        foreach ($tamaños as $tamaño) {
            Tamano::create([
                'descripcion' => $tamaño,
            ]);
        }
    }
}
