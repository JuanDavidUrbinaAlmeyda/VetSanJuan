<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EspecieSeeder::class,
            RazaSeeder::class,
            SexoSeeder::class,
            ColorSeeder::class,
            TamanoSeeder::class,
            DepartamentoSeeder::class,
            CiudadSeeder::class,
            CitasSeeder::class,
            ClienteSeeder::class,
            TamanoSeeder::class,
            MascotaSeeder::class,  
            AdminSeeder::class,
        ]);
    }
}
