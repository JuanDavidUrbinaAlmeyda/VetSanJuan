<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sexo>
 */
class SexoFactory extends Factory
{
    protected $model = \App\Models\Sexo::class;
    public function definition(): array
    {
        return [
            'descripcion' => $this->faker->randomElement(['Macho', 'Hembra']),
        ];
    }
}
