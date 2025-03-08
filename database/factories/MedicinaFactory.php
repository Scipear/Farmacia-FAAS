<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicina>
 */
class MedicinaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'laboratorio_id' => rand(1, 7),
            'medicamento_id' => rand(1, 10),
            'presentacion_id' => rand(1, 7),
            'descripcion' => fake()->sentence(),
            'precio_compra' => rand(10, 500),
            'precio_venta' => rand(20, 800),
        ];
    }
}
