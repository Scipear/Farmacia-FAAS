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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')
            ->constrained('pedidos')
            ->cascadeOnUpdateon()
            ->cascadeOnDelete();
            $table->float('precioPagar');
            $table->text('observaciones');
            $table->string('status');
            $table->date('fechaLlegada');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
