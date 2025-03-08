<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cargos = [
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
            ],

            [
                'nombre' => 'Auxiliar de Farmacia',
            ],

            [
                'nombre' => 'Pasante',
            ]
        ];

        foreach($cargos as $cargo){
            Cargo::create($cargo);
        }
    }
}
