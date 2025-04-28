<?php

namespace Database\Seeders;

use App\Models\Tamanos;
use Illuminate\Database\Seeder;

class TamanoSeeder extends Seeder
{
    public function run()
    {
        $tamanos = ['Pequeño', 'Mediano', 'Grande'];

        foreach ($tamanos as $tamano) {
            Tamanos::create([
                'descripcion' => $tamano,
            ]);
        }
    }
}
