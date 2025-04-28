<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mascotas;
use Faker\Factory as Faker;

class MascotaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Mascotas::create([
                'nombre_mascota' => $faker->firstName,
                'fecha_nacimiento' => $faker->date(),
                'cliente_id' => rand(1, 10), // Asumiendo que tienes 10 clientes
                'especie_id' => rand(1, 5),  // Asumiendo que tienes 5 especies
                'raza_id' => rand(1, 5),     // Asumiendo que tienes 5 razas
                'sexo_id' => rand(1, 2),     // Asumiendo que tienes 2 sexos (masculino, femenino)
                'color_id' => rand(1, 5),    // Asumiendo que tienes 5 colores
                'edad' => rand(1, 15),
                'tamano_id' => rand(1, 3),   // Asumiendo que tienes 3 tamaños
                'peso' => $faker->randomFloat(2, 1, 10),
                'vacunas' => $faker->sentence,
                'alergias' => $faker->sentence,
                'comentarios' => $faker->paragraph,
            ]);
        }
    }
}
