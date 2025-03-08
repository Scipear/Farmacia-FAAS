<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sucursales = [
            [
                'nombre' => 'Rosa',
                'estado' => 'Perales',
                'ciudad' => 'example@mail.com',
                'zona' => 'zona',
                'direccion' => 'Calle 123',
                'correo' => 1
            ],

            [
                'cedula' => '25853499',
                'nombre' => 'Carlos',
                'apellido' => 'Rojas',
                'correo' => 'cr@mail.com',
                'direccion' => 'Calle 321',
                'cargo_id' => 2
            ],

            [
                'cedula' => '35478892',
                'nombre' => 'Luis',
                'apellido' => 'Garcia',
                'correo' => 'lbbbb@mail.com',
                'direccion' => 'Calle 789',
                'cargo_id' => 3
            ],

            [
                'cedula' => '7589248',
                'nombre' => 'Maria',
                'apellido' => 'Gonzales',
                'correo' => 'urra@mail.com',
                'direccion' => 'Calle 5464',
                'cargo_id' => 4
            ]
        ];
    }
}
