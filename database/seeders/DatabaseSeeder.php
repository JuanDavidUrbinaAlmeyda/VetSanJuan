<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cliente;
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
            ClienteSeeder::class,
            CitasSeeder::class,
            TamanoSeeder::class,
            MascotaSeeder::class,  
            AdminSeeder::class,
            MarcaSeeder::class,
            ProductoSeeder::class,
            PresentacionSeeder::class,
        ]);
    }
}
