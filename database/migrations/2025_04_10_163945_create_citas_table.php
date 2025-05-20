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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('hora');
            $table->foreignId('cliente_id')->references('id')->on('clientes');
            $table->foreignId('mascota_id')->references('id')->on('mascotas');
            $table->timestamps();
            $table->foreignId('veterinario_id')->references('id')->on('veterinarios');
            $table->foreignID('tipo_servicio_id')->references('id')->on('servicios');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
