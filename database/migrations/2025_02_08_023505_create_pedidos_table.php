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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sucursal_id')
            ->constrained('sucursales')
            ->cascadeOnUpdateon()
            ->cascadeOnDelete();

            $table->foreignId('empleado_id')
            ->constrained('empleados')
            ->cascadeOnUpdateon()
            ->cascadeOnDelete();

            $table->foreignId('laboratorio_id')
            ->constrained('laboratorios')
            ->cascadeOnUpdateon()
            ->cascadeOnDelete();
            
            $table->float('precioTotal');
            $table->string('tipoPago');
            $table->string('status')->default("Pendiente");
            $table->text('observaciones')->nullable();
            $table->date('fecha_emitida')->default(now()->toDateString());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
