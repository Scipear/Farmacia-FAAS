<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleado_sucursal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sucursal_id')
                ->constrained('sucursales')
                ->cascadeOnUpdateOn()
                ->cascadeOnDelete();
            
            $table->foreignId('empleado_id')
                ->constrained('empleados')
                ->cascadeOnUpdateOn()
                ->cascadeOnDelete();

            $table->date('fecha_inicio')->default(now()->toDateString());
            $table->date('fecha_salida')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_sucursal');
    }
};
