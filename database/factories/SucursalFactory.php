<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sucursal>
 */
class SucursalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->company(),
            'estado' => fake()->state(),
            'ciudad' => fake()->city(),
            'zona' => fake()->streetName(),
            'direccion' => fake()->streetAddress(),
            'correo' => fake()->unique()->safeEmail(),
            'status' => 'Activo'
        ];
    }
}
