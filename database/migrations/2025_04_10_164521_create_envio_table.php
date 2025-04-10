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
        Schema::create('envio', function (Blueprint $table) {
            $table->id();
            $table->string("direccion_id");
            $table->double("costo_envio");
            $table->date("fecha_envio");

            $table->unsignedBigInteger("venta_id");
	        $table->foreign("venta_id") -> references("id") -> on("venta");

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
        Schema::dropIfExists('envio');
    }
};
