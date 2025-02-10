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
            ->onDelete('cascade');

            $table->foreignId('empleado_id')
            ->constrained('empleados')
            ->onDelete('cascade');

            $table->foreignId('laboratorio_id')
            ->constrained('laboratorios')
            ->onDelete('cascade');
            
            $table->float('precioTotal');
            $table->string('tipoPago');
            $table->string('status');
            $table->text('observaciones');
            $table->date('fecha_emitida');
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
