<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfiliadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tipo_solicitud')->nullable();
            $table->unsignedBigInteger('id_tipo_contrato')->nullable();
            $table->unsignedBigInteger('id_aplicacion')->nullable();
            $table->string('numero_sucursal', 45)->nullable();
            $table->unsignedBigInteger('id_tipo_hardware')->nullable();
            $table->unsignedBigInteger('id_ejecutivo_negocios')->nullable();
            $table->string('serie_q_pos', 45)->nullable();
            $table->unsignedBigInteger('id_tipo_cliente')->nullable();
            $table->string('numero_afiliado', 45)->nullable();
            $table->string('version_instalada', 45)->nullable();
            $table->string('cantidad_licencias', 10)->nullable();
            $table->unsignedBigInteger('id_combo_hardware')->nullable();
            $table->unsignedBigInteger('id_area_supervisor')->nullable();
            $table->unsignedBigInteger('id-tipo_capacitacion')->nullable();
            $table->unsignedBigInteger('id_pais')->nullable();
            $table->unsignedBigInteger('id_canton')->nullable();
            $table->string('geolocalizacion', 45)->nullable();
            $table->string('descrip_fachada_local', 120)->nullable();
            $table->unsignedBigInteger('id_tipo_comercio')->nullable();
            $table->unsignedBigInteger('id_tipo_cocina')->nullable();
            $table->unsignedBigInteger('id_rango_precio')->nullable();
            $table->string('nombre_comercio', 45)->nullable();
            $table->string('correo_comercio', 45)->nullable();
            $table->string('telefono_comercio', 45)->nullable();
            $table->string('nombre_contacto_principal', 45)->nullable();
            $table->string('puesto_contacto_principal', 45)->nullable();
            $table->string('telefono_contacto_principal', 45)->nullable();
            $table->string('correo_contacto_principal', 45)->nullable();
            $table->string('nombre_contacto_secundario', 45)->nullable();
            $table->string('puesto_contacto_secundario', 45)->nullable();
            $table->string('telefono_contacto_secundario', 45)->nullable();
            $table->string('correo_contacto_secundario', 45)->nullable();
            $table->unsignedBigInteger('id_regimen_tributario')->nullable();
            $table->string('razon_social', 45)->nullable();
            $table->string('cedula_juridica', 45)->nullable();
            $table->string('actividad_economicia_principal', 45)->nullable();
            $table->string('doc_llave_criptografica', 100)->nullable();
            $table->string('doc_usuario_contrasena', 100)->nullable();
            $table->string('pin', 45)->nullable();
            $table->string('nombre_representante_legal', 45)->nullable();
            $table->unsignedBigInteger('id_tipo_cedula')->nullable();
            $table->string('cedula_representante_legal', 45)->nullable();
            $table->string('profesion_representante_legal', 45)->nullable();
            $table->string('estado_civil_representante_legal', 45)->nullable();
            $table->string('residencia', 45)->nullable();
            $table->timestamps();
            $table->foreign('id_combo_hardware', 'fk_combo_hardware')->references('id')->on('combo_hardware');
            $table->foreign('id_area_supervisor', 'fk_id_area_supervisor')->references('id')->on('area_supervisor');
            $table->foreign('id_canton', 'fk_id_canton')->references('id')->on('canton');
            $table->foreign('id_tipo_cocina', 'fk_id_cocina')->references('id')->on('cocina');
            $table->foreign('id_ejecutivo_negocios', 'fk_id_ejecutivo_negocios')->references('id')->on('ejecutivo_negocios');
            $table->foreign('id_pais', 'fk_id_pais')->references('id')->on('pais');
            $table->foreign('id-tipo_capacitacion', 'fk_id_tipo_capacitacion')->references('id')->on('capacitacion');
            $table->foreign('id_tipo_cedula', 'fk_id_tipo_cedula')->references('id')->on('cedula');
            $table->foreign('id_tipo_cliente', 'fk_id_tipo_cliente')->references('id')->on('cliente');
            $table->foreign('id_tipo_comercio', 'fk_id_tipo_comercio')->references('id')->on('comercio');
            $table->foreign('id_tipo_contrato', 'fk_id_tipo_contrato')->references('id')->on('contrato');
            $table->foreign('id_tipo_hardware', 'fk_id_tipo_hardware')->references('id')->on('hardware');
            $table->foreign('id_tipo_solicitud', 'fk_id_tipo_solicitud')->references('id')->on('solicitud');
            $table->foreign('id_rango_precio', 'fk_rango_precio')->references('id')->on('rango_precio');
            $table->foreign('id_regimen_tributario', 'fk_regimen_tributario')->references('id')->on('regimen_tributario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afiliados');
    }
}
