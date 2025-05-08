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
        $color=[
            ['description'=>'Blanco'],
            ['description'=>'Negro'],
            ['description'=>'Marrón'],
            ['description'=>'Gris'],
            ['description'=>'Amarillo'],
            ['description'=>'Naranja'],
            ['description'=>'Rojo'],
            ['description'=>'Verde'],
            ['description'=>'Azul'],
            ['description'=>'Violeta'],
            ['description'=>'Rosa'],
            ['description'=>'Beige'],
        ];
        foreach($color as $color){
            Color::create($color);
        }
    }
}
