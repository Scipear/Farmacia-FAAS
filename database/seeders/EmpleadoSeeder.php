<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empleados = [
            [
                'cedula' => '12248585',
                'nombre' => 'Rosa',
                'apellido' => 'Perales',
                'correo' => 'example@mail.com',
                'direccion' => 'Calle 123',
            ],

            [
                'cedula' => '25853499',
                'nombre' => 'Carlos',
                'apellido' => 'Rojas',
                'correo' => 'cr@mail.com',
                'direccion' => 'Calle 321',
            ],

            [
                'cedula' => '35478892',
                'nombre' => 'Luis',
                'apellido' => 'Garcia',
                'correo' => 'lbbbb@mail.com',
                'direccion' => 'Calle 789',
            ],

            [
                'cedula' => '7589248',
                'nombre' => 'Maria',
                'apellido' => 'Gonzales',
                'correo' => 'urra@mail.com',
                'direccion' => 'Calle 5464',
            ]
        ];

        $i = 1;
        foreach($empleados as $empleadoData){
            $sucursalId = rand(1, 10);

            $empleado = Empleado::create($empleadoData);
            $empleado->cargos()->attach($i);
            $empleado->sucursales()->attach($sucursalId);
            $empleado->telefonos()->create([
                'empleado_id' => $empleado->id,
                'tipo' => 'Celular',
                'numero' => fake()->unique()->numberBetween(500000, 1000000)
            ]);

            $i = $i + 1;
        }

        $empleadosFactory = Empleado::factory(50)->create();

        foreach($empleadosFactory as $empleado){
            $cargoId = rand(1, 6);
            $sucursalId = rand(1, 10);
    
            $empleado->cargos()->attach($cargoId);
            $empleado->sucursales()->attach($sucursalId);
            $empleado->telefonos()->create([
                'empleado_id' => $empleado->id,
                'tipo' => 'Celular',
                'numero' => fake()->unique()->numberBetween(500000, 1000000)
            ]);
        }
    }
}
