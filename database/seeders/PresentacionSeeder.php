<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Presentacion;

class PresentacionSeeder extends Seeder
{
    public function run()
    {
        // Presentaciones para Dog Chow (ID: 1)
        Presentacion::create([
            'producto_id' => 1,
            'nombre' => '2 kg',
            'precio_unitario' => 25000,
            'cantidad_inventario' => 50
        ]);

        Presentacion::create([
            'producto_id' => 1,
            'nombre' => '15 kg',
            'precio_unitario' => 120000,
            'cantidad_inventario' => 30
        ]);

        // Presentaciones para Whiskas (ID: 2)
        Presentacion::create([
            'producto_id' => 2,
            'nombre' => '85g',
            'precio_unitario' => 3500,
            'cantidad_inventario' => 100
        ]);

        Presentacion::create([
            'producto_id' => 2,
            'nombre' => '500g',
            'precio_unitario' => 15000,
            'cantidad_inventario' => 50
        ]);

        // ... más presentaciones ...
    }
}