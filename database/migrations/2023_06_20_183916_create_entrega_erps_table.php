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
        Schema::create('entrega_erps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario'); //persona logeada
            $table->string('proceso')->nullable();
            $table->string('citada_por')->nullable();
            $table->string('moderador')->nullable();
            $table->string('secretario')->nullable();
            $table->date('fecha')->nullable();
            $table->string('hora_inicio')->nullable();
            $table->string('hora_fin')->nullable();
            $table->string('lugar')->nullable();
            $table->json('participantes')->nullable(); // N° - Nombre - Cargo - Firma
            $table->string('punto_discusion')->nullable();
            $table->string('desarrollo_reunion')->nullable();
            $table->json('planes_accion')->nullable(); // N° - Tarea - Responsable - Fecha Ejecucion - Seguimiento (cumple- no cumple)
            $table->string('observaciones')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('entrega_erps');
    }
};
