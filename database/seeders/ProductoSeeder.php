<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        $productos = [
            [
                'nombre' => 'Dog Chow Adultos',
                'description' => 'Alimento completo y balanceado para perros adultos',
                'especie' => 'perro',
                'marca_id' => 2, // ID de Dog Chow
                'edad' => 'adulto',
                'categoria' => 'Alimentos',
                'destacado' => '1',
                'imagen' => 'productos/dogchow.jpg',
                'precio' => 25000,
                'cantidad_inventario' => 50,
            ],
            [
                'nombre' => 'Royal Canin Kitten',
                'description' => 'Alimento premium para gatitos en crecimiento',
                'especie' => 'gato',
                'marca_id' => 1, // ID de Royal Canin
                'edad' => 'cachorro',
                'categoria' => 'Alimentos',
                'destacado' => '1',
                'imagen' => 'productos/royalcanin.jpg',
                'precio' => 35000,
                'cantidad_inventario' => 30,
            ],
            [
                'nombre' => 'Pro Plan Adult Small Breed',
                'description' => 'Alimento especializado para perros adultos de razas pequeñas',
                'especie' => 'perro',
                'marca_id' => 3, // ID de Pro Plan
                'edad' => 'adulto',
                'categoria' => 'Alimentos',
                'destacado' => '0',
                'imagen' => 'productos/proplan.jpg',
                'precio' => 30000,
                'cantidad_inventario' => 40,
            ],
            [
                'nombre' => 'Hills Science Diet Adult',
                'description' => 'Alimento científicamente formulado para perros adultos',
                'especie' => 'perro',
                'marca_id' => 4, // ID de Hills
                'edad' => 'adulto',
                'categoria' => 'Alimentos',
                'destacado' => '0',
                'imagen' => 'productos/hills.jpg',
                'precio' => 40000,
                'cantidad_inventario' => 25,
            ],
            [
                'nombre' => 'Whiskas Pescado',
                'description' => 'Alimento húmedo con sabor a pescado para gatos',
                'especie' => 'gato',
                'marca_id' => 5,
                'edad' => 'adulto',
                'categoria' => 'Alimentos',
                'destacado' => '1',
                'imagen' => 'productos/whiskas.jpg',
                'precio' => 15000,
                'cantidad_inventario' => 60,
            ],
        ];

        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}