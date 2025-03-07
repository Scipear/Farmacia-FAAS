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
        Schema::create('medicinas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('laboratorio_id')
                ->constrained('laboratorios')
                ->cascadeOnUpdateon()
                ->cascadeOnDelete();

            $table->foreignId('medicamento_id')
                ->constrained('medicamentos')
                ->cascadeOnUpdateon()
                ->cascadeOnDelete();

            $table->foreignId('presentacion_id')
                ->constrained('presentaciones')
                ->cascadeOnUpdateon()
                ->cascadeOnDelete();

            $table->longText('descripcion');
            $table->float('precio_compra', 10, 2);
            $table->float('precio_venta', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamento_producto');
    }
};
