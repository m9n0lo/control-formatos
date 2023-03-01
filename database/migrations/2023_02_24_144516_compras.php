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
            $table->unsignedBigInteger('solicitado_por'); //persona logeada//personal de la empresa
            $table->date('fecha_elaboracion')->nullable();
            $table->unsignedBigInteger('jefe_inmediato')->nullable(); //personal de la empresa
            $table->date('fecha_solicitud')->nullable();
            $table->date('fecha_esperada')->nullable();
            $table->string('tipo_solicitud')->nullable();
            $table->string('sede')->nullable(); //centro operacion
            $table->string('razon_social')->nullable();
            $table->string('correo_electronico')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->json('servicios')->nullable();
            $table->string('cotizacion3')->nullable();
            $table->string('cotizacion2')->nullable();
            $table->string('cotizacion1')->nullable();
            $table->string('detalle_solicitud')->nullable();
            $table->string('costo_estimado')->nullable();
            $table->string('estado_gestion')->nullable();
            $table->string('estado')->nullable();
            $table->timestamps();
            $table->foreign('solicitado_por')->references('id')->on('users');
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
