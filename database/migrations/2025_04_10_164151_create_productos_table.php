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
            $table->string("nombre");
            $table->text("description");
	        $table->double("precio_unitario");
	        $table->integer("cantidad_inventario");
            $table->string("url_imagen")->nullable();
            $table->timestamps();
            $table->string("categoria")->nullable();
            $table->string("marca")->nullable();
            $table->string("subcategoria")->nullable();
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