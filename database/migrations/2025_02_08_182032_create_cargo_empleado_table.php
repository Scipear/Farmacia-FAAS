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
        Schema::create('cargoEmpleado', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('cargo_id')
                ->constrained('cargos')
                ->cascadeOnUpdateon()
                ->cascadeOnDelete();

            
            $table->foreignId('empleado_id')
                ->constrained('empleados')
                ->cascadeOnUpdateon()
                ->cascadeOnDelete();

            $table->date('fechaInicio');
            $table->date('fechaFin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargoEmpleado');
    }
};
