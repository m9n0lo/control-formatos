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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('area')->nullable(); //centro costo
            $table->unsignedBigInteger('users_id')->nullable(); //persona logeada
            $table->unsignedBigInteger('solicitado_por')->nullable(); //personal de la empresa
            $table->date('fecha_elaboracion')->nullable();
            $table->unsignedBigInteger('jefe_inmediato')->nullable(); //personal de la empresa
            $table->date('fecha_solicitud')->nullable();
            $table->date('fecha_esperada');
            $table->string('tipo_solicitud')->nullable();
            $table->string('sede')->nullable(); //centro operacion
            $table->string('razon_social');
            $table->string('correo_electronico');
            $table->string('telefono_contacto');
            $table->json('servicios')->nullable();
            $table->string('cotizacion1');
            $table->string('cotizacion2');
            $table->string('cotizacion3');
            $table->string('detalle_solicitud')->nullable();
            $table->string('costo_estimado')->nullable();
            $table->string('estado_gestion')->nullable();
            $table->string('estado')->nullable();
            $table->timestamps();
            $table->foreign('solicitado_por')->references('id')->on('personas');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('jefe_inmediato')->references('id')->on('personas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
};
