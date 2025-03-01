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
        Schema::create('medicina_sucursal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicina_id')
                ->constrained()
                ->cascadeOnUpdateOn()
                ->cascadeOnDelete();

            $table->foreignId('sucursal_id')
                ->constrained('sucursales')
                ->cascadeOnUpdateon()
                ->cascadeOnDelete();

            $table->unsignedInteger('cantidad');
            $table->text('observacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicina_sucursal');
    }
};
