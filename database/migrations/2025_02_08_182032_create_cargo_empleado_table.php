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
        Schema::create('cargo_empleado', function (Blueprint $table) {
            $table->id();
           
            $table->foreignId('cargos_id')
                ->constrained()
                ->cascadeOnUpdateon()
                ->cascadeOnDelete();

            
            $table->foreignId('empleados_id')
                ->constrained()
                ->cascadeOnUpdateon()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargo_empleado');
    }
};
