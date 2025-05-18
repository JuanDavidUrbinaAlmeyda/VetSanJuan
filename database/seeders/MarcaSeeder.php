<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marca;

class MarcaSeeder extends Seeder
{
    public function run()
    {
        $marcas = [
            [
                'nombre' => 'Royal Canin',
            ],
            [
                'nombre' => 'Dog Chow',
            ],
            [
                'nombre' => 'Pro Plan',
            ],
            [
                'nombre' => 'Hills',
            ],
            [
                'nombre' => 'Whiskas',
            ],
        ];

        foreach ($marcas as $marca) {
            Marca::create($marca);
        }
    }
}