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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('description');
            $table->string('especie');
            $table->foreignId('marca_id')->constrained('marcas')->onDelete('cascade');
            $table->string('edad');
            $table->string('categoria');
            $table->string('imagen')->nullable();
            $table->string('destacado')->nullable();
            $table->decimal('precio', 10, 2);
            $table->integer('cantidad_inventario')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
