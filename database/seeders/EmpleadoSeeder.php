<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\Empleado;
use App\Models\Rol;
use App\Models\User;
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
                'correo' => 'administrador1@mail.com',
                'direccion' => 'Calle 123',
            ],

            [
                'cedula' => '25853499',
                'nombre' => 'Carlos',
                'apellido' => 'Rojas',
                'correo' => 'gerente1@mail.com',
                'direccion' => 'Calle 321',
            ],

            [
                'cedula' => '35478892',
                'nombre' => 'Luis',
                'apellido' => 'Garcia',
                'correo' => 'farmaceutico1@mail.com',
                'direccion' => 'Calle 789',
            ],

            [
                'cedula' => '7589248',
                'nombre' => 'Maria',
                'apellido' => 'Gonzales',
                'correo' => 'analista1@mail.com',
                'direccion' => 'Calle 5464',
            ],

            [
                'cedula' => '456412',
                'nombre' => 'Betty',
                'apellido' => 'Del Rey',
                'correo' => 'administrador2@mail.com',
                'direccion' => 'Calle 85996',
            ],

            [
                'cedula' => '333333',
                'nombre' => 'Lorenzo',
                'apellido' => 'Sifontes',
                'correo' => 'gerente2@mail.com',
                'direccion' => 'Calle 78645',
            ],

            [
                'cedula' => '6657852',
                'nombre' => 'Mina',
                'apellido' => 'Rin',
                'correo' => 'farmaceutico2@mail.com',
                'direccion' => 'Loma Linda',
            ],

            [
                'cedula' => '28611',
                'nombre' => 'Victor',
                'apellido' => 'Vasquez',
                'correo' => 'analista2@mail.com',
                'direccion' => 'Villa Betania',
            ]
        ];

        $i = 1;
        $j = 1;
        foreach($empleados as $empleadoData){
            $sucursalId = rand(1, 10);

            $empleado = Empleado::create($empleadoData);
            $empleado->cargos()->attach($i);
            $empleado->sucursales()->attach($j);
            $empleado->telefonos()->create([
                'empleado_id' => $empleado->id,
                'tipo' => 'Personal',
                'numero' => fake()->unique()->numberBetween(500000, 1000000)
            ]);

            $cargo = Cargo::findOrFail($i);
            $rol = Rol::where('nombre', $cargo->nombre)->first();

            User::create([
                'empleado_id' => $empleado->id,
                'rol_id' => $rol->id,
                'email' => $empleado->correo,
                'password' => 'password',
            ]);

            $i = $i + 1;

            if($i == 5){
                $i = 1;
                $j = $j + 1;
            }
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