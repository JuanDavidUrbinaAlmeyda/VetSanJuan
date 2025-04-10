<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colores = [
            ['descripcion' => 'Negro'],
            ['descripcion' => 'Blanco'],
            ['descripcion' => 'Marrón'],
            ['descripcion' => 'Gris'],
            ['descripcion' => 'Atigrado'],
        ];

        foreach ($colores as $color) {
            Color::create($color);
        }
    }
}
