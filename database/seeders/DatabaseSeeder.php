<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cliente;
use App\Models\Departamento;
use App\Models\Servicios;
use App\Models\Sexo;
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
            AdminSeeder::class,
            MarcaSeeder::class,
            ProductoSeeder::class,
            PresentacionSeeder::class,
            ServiciosSeeder::class,
            DepartamentosSeeder::class,
            CiudadesSeeder::class,
            EspecieSeeder::class,
            SexoSeeder::class,
        ]);
    }
}
