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
        Schema::create('detalle_entrega_ssts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('articulos_id')->nullable();
            $table->unsignedBigInteger('entregas_id')->nullable();
            $table->string('cantidad_entregada')->nullable();
            $table->string('observaciones')->nullable();
            $table->foreign('articulos_id')->references('id')->on('articulos_ssts');
            $table->foreign('entregas_id')->references('id')->on('entrega_sst');
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
        Schema::dropIfExists('detalle_entrega_ssts');
    }
};
