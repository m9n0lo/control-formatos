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
        Schema::create('inventarios_ssts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario'); //persona logeada
            $table->unsignedBigInteger('articulos_id');
            $table->string('cantidad_disponible');
            $table->string('sede');
            $table->string('observaciones')->nullable();
            $table->date('fecha_ingreso');
            $table->timestamps();
            $table->foreign('articulos_id')->references('id')->on('articulos_ssts');
            $table->foreign('usuario')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventarios_sst');
    }
};
