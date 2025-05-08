<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use Faker\Factory as Faker;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Cliente::create([
                'nombre' => $faker->firstName,
                'apellido' => $faker->lastName,
                'direccion' => $faker->address,
                'telefono' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'ciudad' => $faker->city,
                'ciudad_id' => rand(1, 5), // Suponiendo que tienes 5 ciudades en la base
            ]);
        }
    }
}
