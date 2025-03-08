<?php

namespace Database\Seeders;

use App\Models\Laboratorio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaboratorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laboratorios = [
            [
                'nombre' => 'Bayer',
                'ciudad' => fake()->city(),
                'direccion' => fake()->streetAddress(),
                'correo' => fake()->unique()->safeEmail(),
            ],

            [
                'nombre' => 'Elea',
                'ciudad' => fake()->city(),
                'direccion' => fake()->streetAddress(),
                'correo' => fake()->unique()->safeEmail(),
            ],

            [
                'nombre' => 'Elmor',
                'ciudad' => fake()->city(),
                'direccion' => fake()->streetAddress(),
                'correo' => fake()->unique()->safeEmail(),
            ],

            [
                'nombre' => 'Genven',
                'ciudad' => fake()->city(),
                'direccion' => fake()->streetAddress(),
                'correo' => fake()->unique()->safeEmail(),
            ],

            [
                'nombre' => 'Roemmers',
                'ciudad' => fake()->city(),
                'direccion' => fake()->streetAddress(),
                'correo' => fake()->unique()->safeEmail(),
            ],

            [
                'nombre' => 'Eurofarma',
                'ciudad' => fake()->city(),
                'direccion' => fake()->streetAddress(),
                'correo' => fake()->unique()->safeEmail(),
            ],

            [
                'nombre' => 'Gador',
                'ciudad' => fake()->city(),
                'direccion' => fake()->streetAddress(),
                'correo' => fake()->unique()->safeEmail(),
            ],
        ];

        foreach($laboratorios as $laboratorioData){
            $laboratorio = Laboratorio::create($laboratorioData);
            $laboratorio->telefonos()->create([
                'laboratorio_id' => $laboratorio->id,
                'tipo' => 'Local',
                'numero' => fake()->unique()->numberBetween(500000, 1000000)
            ]);
        }
    }
}
