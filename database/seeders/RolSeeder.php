<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'nombre' => 'Administrador General'
            ],

            [
                'nombre' => 'Gerente'
            ],

            [
                'nombre' => 'Farmaceutico',
            ],

            [
                'nombre' => 'Analista de Compra',
            ]
        ];

        foreach($roles as $rol){
            Rol::create($rol);
        }
    }
}
