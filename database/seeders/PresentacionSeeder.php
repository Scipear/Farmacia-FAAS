<?php

namespace Database\Seeders;

use App\Models\Presentacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $presentaciones = [
            [
                'tipo' => 'Tableta',
                'cantidad' => '500',
                'medida' => 'mg',
                'unidades' => '20',
            ],

            [
                'tipo' => 'Tableta',
                'cantidad' => '850',
                'medida' => 'mg',
                'unidades' => '10',
            ],

            [
                'tipo' => 'Jarabe',
                'cantidad' => '1000',
                'medida' => 'ml',
                'unidades' => '1',
            ],

            [
                'tipo' => 'Jarabe',
                'cantidad' => '500',
                'medida' => 'ml',
                'unidades' => '1',
            ],

            [
                'tipo' => 'Tableta',
                'cantidad' => '300',
                'medida' => 'mg',
                'unidades' => '24',
            ],

            [
                'tipo' => 'Ampolla',
                'cantidad' => '500',
                'medida' => 'mg',
                'unidades' => '10',
            ],

            [
                'tipo' => 'Topico',
                'cantidad' => '50',
                'medida' => 'g',
                'unidades' => '1',
            ],
        ];

        foreach($presentaciones as $presentacion){
            Presentacion::create($presentacion);
        }
    }
}
