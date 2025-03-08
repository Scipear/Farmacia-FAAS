<?php

namespace Database\Seeders;

use App\Models\Medicina;
use App\Models\Sucursal;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(CargoSeeder::class);
        $this->call(MonodrogaSeeder::class);
        $this->call(AccionTSeeder::class);
        $this->call(PresentacionSeeder::class);
        $this->call(LaboratorioSeeder::class);
        $this->call(MedicamentoSeeder::class);
        Medicina::factory(50)->create();
        $this->call(SucursalSeeder::class);
        $this->call(EmpleadoSeeder::class);

        // User::factory(10)->create();

        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);
    }
}
