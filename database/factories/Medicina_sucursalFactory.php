<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Medicina_sucursalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'medicina_id' => rand(1, 50),
            'sucursal_id' => rand(1, 10),
            'cantidad' => rand(1, 100),
        ];
    }
}
