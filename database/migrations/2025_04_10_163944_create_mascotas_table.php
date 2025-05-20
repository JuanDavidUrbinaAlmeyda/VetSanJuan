<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_mascota');
            $table->date('fecha_nacimiento');
            $table->foreignId('cliente_id')->references('id')->on('clientes');
            $table->foreignId('especie_id')->references('id')->on('especie');
            $table->foreignId('sexo_id')->references('id')->on('sexo');
            $table->integer('edad');
            $table->float('peso');
            $table->string('vacunas')->nullable();
            $table->string('alergias')->nullable();
            $table->string('comentarios')->nullable();
            $table->timestamps();
            $table->string('foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
};
