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
        Schema::create('venta_producto', function (Blueprint $table) {
            $table->id();

	        $table->unsignedBigInteger("venta_id");
	        $table->foreign("venta_id") -> references("id") -> on("venta");

	        $table->unsignedBigInteger("producto_id");
	        $table->foreign("producto_id") -> references("id") -> on("productos");

	        $table->integer("cantidad");
	        $table->double("sub_total");
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
        Schema::dropIfExists('venta_producto');
    }
};