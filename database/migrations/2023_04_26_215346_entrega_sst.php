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
        Schema::create('entrega_sst', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario'); //persona logeada//personal de la empresa
            $table->unsignedBigInteger('persona_id')->nullable(); //personal de la empresa
            $table->unsignedBigInteger('articulos')->nullable(); //articulo a entregar
            $table->date('fecha_entrega');
            $table->string('otro')->nullable();
            $table->string('firma');
            $table->string('observaciones')->nullable();
            $table->string('firma_sgsst');
            $table->timestamps();
            $table->foreign('usuario')->references('id')->on('users');
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('articulos')->references('id')->on('articulos_sst');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrega_sst');
    }
};
