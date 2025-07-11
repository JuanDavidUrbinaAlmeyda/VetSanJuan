<?php

namespace Database\Seeders;

use App\Models\Sexo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sexo = [
            ['description' => 'Macho'],
            ['description' => 'Hembra'],
        ];
        foreach($sexo as $sexo){
            Sexo::create($sexo);
        }
    }
}
