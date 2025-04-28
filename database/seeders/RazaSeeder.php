<?php

namespace Database\Seeders;

use App\Models\Raza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $raza =[
        ['nombre_raza' => 'Labrador'],
        ['nombre_raza' => 'Bulldog'],
        ['nombre_raza' => 'Beagle'],
        ['nombre_raza' => 'Poodle'],
        ['nombre_raza' => 'Siamés'],
        ['nombre_raza' => 'Persa'],
        ['nombre_raza' => 'Maine'],
        ['nombre_raza' => 'Ragdoll'],
        ['nombre_raza' => 'Amazona'],
        ['nombre_raza' => 'Cacique'],
        ['nombre_raza' => 'Aldabra'],
        ['nombre_raza' => 'Holland Lop'],
        ['nombre_raza' => 'Mini Rex'],
        ['nombre_raza' => 'Himalayo'],
        ['nombre_raza' => 'Bengalí'],
        ['nombre_raza' => 'Sphynx'],
      ];

      foreach ($raza as $raza) {
        Raza::create($raza);
      }
    }
}
