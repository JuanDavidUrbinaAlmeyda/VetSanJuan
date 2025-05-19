<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\User;
use Faker\Factory as Faker;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            // 1. Creamos un nuevo usuario con la factory
            $user = User::factory()->create([
                'role' => 'cliente' // opcional, pero recomendado
            ]);

            // 2. Creamos un cliente vinculado a ese usuario
            Cliente::create([
                'nombre' => $faker->firstName,
                'apellido' => $faker->lastName,
                'direccion' => $faker->address,
                'telefono' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'ciudad' => $faker->city,
                'ciudad_id' => rand(1, 5), // asegurate que existan ciudades con esos IDs
                'user_id' => $user->id
            ]);
        }
    }
}