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
        Schema::create('telefonosLaboratorios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('laboratorio_id')
                ->constrained()
                ->cascadeOnUpdateon()
                ->cascadeOnDelete();

            $table->string('numero');
            $table->string('tipo');
        });

        Schema::create('telefonosSucursales', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sucursal_id')
                ->constrained('sucursales')
                ->cascadeOnUpdateon()
                ->cascadeOnDelete();

            $table->string('numero');
            $table->string('tipo');
        });

        Schema::create('telefonosEmpleados', function (Blueprint $table) {
            $table->id();

            $table->foreignId('empleado_id')
                ->constrained()
                ->cascadeOnUpdateon()
                ->cascadeOnDelete();

            $table->string('numero');
            $table->string('tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefonosLaboratorios');
        Schema::dropIfExists('telefonosSucursales');
        Schema::dropIfExists('telefonosEmpleados');
    }
};
