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
        Schema::create('sucursal_laboratorio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sucursal_id')
                ->constrained('sucursales')
                ->cascadeOnUpdateOn()
                ->cascadeOnDelete();

            $table->foreignId('laboratorio_id')
                ->constrained()
                ->cascadeOnUpdateOn()
                ->cascadeOnDelete();

            $table->date('fecha_inicio');
            $table->date('fecha_final');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sucursal_laboratorio');
    }
};
