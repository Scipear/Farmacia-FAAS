<?php

namespace Database\Seeders;

use App\Models\Monodroga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonodrogaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $monodrogas = [
            [
                'nombre' => 'Alprazolam'
            ],

            [
                'nombre' => 'Amoxicilina'
            ],

            [
                'nombre' => 'Cefalexina',
            ],

            [
                'nombre' => 'Ciprofloxacina',
            ],

            [
                'nombre' => 'Clonazepam',
            ],

            [
                'nombre' => 'Levonorgestrel',
            ],

            [
                'nombre' => 'Loratadina',
            ],

            [
                'nombre' => 'Metoclopramida',
            ],

            [
                'nombre' => 'Omeprazol',
            ],

            [
                'nombre' => 'Ribavirina',
            ]
        ];

        foreach($monodrogas as $monodroga){
            Monodroga::create($monodroga);
        }
    }
}
