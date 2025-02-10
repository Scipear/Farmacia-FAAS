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
        Schema::create('medicamento_modroga', function (Blueprint $table) {
            $table->id();

            
            $table->foreignId('medicamento_id')
                ->constrained('medicamentos')
                ->cascadeOnUpdateon()
                ->cascadeOnDelete();

            
            $table->foreignId('monodroga_id')
                ->constrained('monodrogas')
                ->cascadeOnUpdateon()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamento_modroga');
    }
};
