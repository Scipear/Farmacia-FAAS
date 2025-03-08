<?php

namespace Database\Seeders;

use App\Models\Medicamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicamentos = [
            [
                'nombre' => 'POVIRAL'
            ],

            [
                'nombre' => 'DROXOL'
            ],

            [
                'nombre' => 'PRINOX',
            ],

            [
                'nombre' => 'NOBACTAM',
            ],

            [
                'nombre' => 'PLENACOR',
            ],

            [
                'nombre' => 'LIPITOR',
            ],

            [
                'nombre' => 'CORTEROID',
            ],

            [
                'nombre' => 'LOSTAPROLOL',
            ],

            [
                'nombre' => 'CALCIONAL',
            ],

            [
                'nombre' => 'OMEGA 100',
            ]
        ];

        foreach($medicamentos as $medicamentoData){
            $monodroga = rand(1, 10);
            $accion = rand(1, 10);
            $medicamento = Medicamento::create($medicamentoData);
            $medicamento->monodrogas()->attach($monodroga);
            $medicamento->accionTerapeutica()->attach($accion);
        }
    }
}
