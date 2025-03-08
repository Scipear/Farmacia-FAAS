<?php

namespace Database\Seeders;

use App\Models\AccionTerapeutica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccionTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accionT = [
            [
                'nombre' => 'Descongestivo'
            ],

            [
                'nombre' => 'Anticoagulante'
            ],

            [
                'nombre' => 'Antiviral',
            ],

            [
                'nombre' => 'Antidepresivo',
            ],

            [
                'nombre' => 'Antialergico',
            ],

            [
                'nombre' => 'Analgesico',
            ],

            [
                'nombre' => 'Expectorante',
            ],

            [
                'nombre' => 'Antihipertensivo',
            ],

            [
                'nombre' => 'Antiinflamatorio',
            ],

            [
                'nombre' => 'Relajante Muscular',
            ]
        ];

        foreach($accionT as $accion){
            AccionTerapeutica::create($accion);
        }
    }
}
