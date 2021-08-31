<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplicacionAfiliadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplicacion_afiliado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_afiliado');
            $table->unsignedBigInteger('id_aplicacion');
            $table->unsignedBigInteger('id_modalidad');
            $table->bigInteger('cantidad')->nullable();
            $table->bigInteger('precioUnitario')->nullable();
            $table->bigInteger('subtotal')->nullable();
            $table->date('fecha_solicitud')->nullable();
            $table->date('fecha_instalacion')->nullable();
            $table->date('fecha_desactivacion')->nullable();
            $table->string('estado', 1)->nullable();
            $table->timestamps();
            $table->foreign('id_afiliado', 'fk_id_afiliado')->references('id')->on('afiliados');
            $table->foreign('id_aplicacion', 'fk_id_aplicacion')->references('id')->on('aplicacion');
            $table->foreign('id_modalidad', 'fk_id_modalidad')->references('id')->on('modalidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aplicacion_afiliado');
    }
}
