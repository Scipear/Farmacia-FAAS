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
        Schema::create('telefonos_laboratorios', function (Blueprint $table) {
            $table->id();

            $table->foreignId('laboratorio_id')
                ->constrained()
                ->cascadeOnUpdateon()
                ->cascadeOnDelete();

            $table->string('numero');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefonos_laboratorios');
    }
};
