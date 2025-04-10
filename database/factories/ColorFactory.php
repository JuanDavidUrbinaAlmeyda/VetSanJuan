<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Color>
 */
class ColorFactory extends Factory
{
    protected $model = \App\Models\Color::class;
    public function definition(): array
    {
        return [
            'descripcion' => $this->faker->unique()->colorName(), // Ej: "Rojo", "Azul"
        ];
    }
}
