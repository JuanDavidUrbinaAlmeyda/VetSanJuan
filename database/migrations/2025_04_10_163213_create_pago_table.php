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
        Schema::create('pago', function (Blueprint $table) {
            $table->id();
            $table->foreignId('metodo_id')->references('id')->on('metodo');
            $table->foreignId('venta_id')->references('id')->on('venta');
            $table->date('fecha_pago');
            $table->decimal('monto_pago');
            $table->string('referencia_pago')->nullable();
            $table->float('descuento_aplicado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pago');
    }
};
