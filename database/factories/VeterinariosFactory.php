<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\veterinarios>
 */
class VeterinariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->sentence(),
            'especialidad' => fake()->paragraph(), 
            'telefono' => fake()->random_int(30000000000,40000000000),
            'licencia_profesional' => $this->faker->bothify('LIC-#######'),
            'fecha_licencia' => $this->faker->date(),
        ];
    }
}
