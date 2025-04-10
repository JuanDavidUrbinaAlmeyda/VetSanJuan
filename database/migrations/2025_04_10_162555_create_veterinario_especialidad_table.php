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
        Schema::create('veterinario_especialidad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('veterinarios_id');
            $table->unsignedBigInteger('especialidad_id');
            $table->timestamps();

            $table->foreign('veterinarios_id')->references('id')->on('veterinarios');
            $table->foreign('especialidad_id')->references('id')->on('especialidad');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veterinario_especialidad');
    }
};
