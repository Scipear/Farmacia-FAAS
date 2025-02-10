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
            $table->timestamps();
        });

        Schema::create('medicina_pedido', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicina_id')
                ->constrained('medicinas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('pedido_id')
                ->constrained('pedidos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('cantidad');
            $table->float('precio');
            $table->timestamps();
        });

        Schema::create('medicina_compra', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicina_id')
                ->constrained('medicinas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('compra_id')
                ->constrained('compras')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('cantidad');
            $table->float('precio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicinas');
        Schema::dropIfExists('medicina_pedido');
        Schema::dropIfExists('medicina_compra');
    }
};
