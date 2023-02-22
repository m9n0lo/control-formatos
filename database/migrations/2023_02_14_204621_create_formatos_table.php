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
        Schema::create('formatos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->nullable(); //persona logeada
            $table->unsignedBigInteger('persona_id')->nullable(); //personal de la empresa
            $table->string('nombre_equipo');
            $table->date('fecha_mant_est');
            $table->date('fecha_retiro');
            $table->date('fecha_entrega');
            $table->string('observaciones');
            $table->string('firma');
            $table->timestamps();
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('persona_id')->references('id')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formatos');
    }
};
