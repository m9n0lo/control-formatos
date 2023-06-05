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
        Schema::create('detalle_inventario_ssts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventario_id');
            $table->unsignedBigInteger('articulos_id');
            $table->string('cantidad_disponible');
            $table->timestamps();
            $table->foreign('articulos_id')->references('id')->on('articulos_ssts');
            $table->foreign('inventario_id')->references('id')->on('inventarios_ssts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_inventario_ssts');
    }
};
