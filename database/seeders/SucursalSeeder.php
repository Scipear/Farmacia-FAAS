<?php

namespace Database\Seeders;

use App\Models\Sucursal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sucursalesFactory = Sucursal::factory(10)->create();

        foreach($sucursalesFactory as $sucursal){
            $sucursal->telefonos()->create([
                'sucursal_id' => $sucursal->id,
                'tipo' => 'Local',
                'numero' => fake()->unique()->numberBetween(500000, 1000000)
            ]);
        }
    }
}
