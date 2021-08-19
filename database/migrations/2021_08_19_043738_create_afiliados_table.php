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
            $table->string('nombre_afiliado', 45);
            $table->string('apellido1_afiliado', 45);
            $table->string('apellido2_afiliado', 45);
            $table->string('telefono_afiliado', 12);
            $table->string('correo_afiliado', 45);
            $table->unsignedBigInteger('id_tipo_cedula');
            $table->string('num_cedula', 45)->nullable();
            $table->string('puesto_afiliado', 45)->nullable();
            $table->unsignedBigInteger('id_canton');
            $table->string('geolocalizacion', 45)->nullable();
            $table->string('otras_senas', 45)->nullable();
            $table->unsignedBigInteger('id_aplicacion');
            $table->unsignedBigInteger('id_tipo_solicitud');
            $table->unsignedBigInteger('id_tipo_contrato');
            $table->unsignedBigInteger('id_tipo_cliente');
            $table->string('numero_afiliado', 45)->nullable();
            $table->string('cantidad_licencias', 10)->nullable();
            $table->string('sucursal', 45)->nullable();
            $table->string('version_instalada', 45)->nullable();
            $table->string('nombre_comercio', 45)->nullable();
            $table->string('correo_comercio', 45)->nullable();
            $table->string('telefono_comercio', 45)->nullable();
            $table->unsignedBigInteger('id_tipo_comercio');
            $table->string('estado_civil_representante', 45);
            $table->string('profesion_representante', 45);
            $table->string('nombre_contacto_principal', 45)->nullable();
            $table->string('puesto_contacto_principal', 45)->nullable();
            $table->string('correo_contacto_principal', 45)->nullable();
            $table->string('telefono_contacto_principal', 45)->nullable();
            $table->string('nombre_contacto_secundario', 45)->nullable();
            $table->string('puesto_contacto_secundario', 45)->nullable();
            $table->string('correo_contacto_secundario', 45)->nullable();
            $table->string('telefono_contacto_secundario', 45)->nullable();
            $table->string('razon_social', 45)->nullable();
            $table->string('cedula_juridica', 45)->nullable();
            $table->string('regimen_tributario', 45)->nullable();
            $table->string('actividad_economicia_principal', 45)->nullable();
            $table->string('tuvo_actividad_ced_juridica', 10)->nullable();
            $table->string('ultimo_consecutivo_factura', 45)->nullable();
            $table->string('ultimo_consecutivo_tiquete', 45)->nullable();
            $table->string('ultimo_consecutivo_nota_credito', 45)->nullable();
            $table->string('nombre_representante_legal', 45)->nullable();
            $table->string('cedula_representante_legal', 45)->nullable();
            $table->string('profesion_representante_legal', 45)->nullable();
            $table->string('estado_civil_representante_legal', 45)->nullable();
            $table->string('tipo_hardware', 45)->nullable();
            $table->string('combo_hardware', 45)->nullable();
            $table->string('ejecutivo_negocios', 45)->nullable();
            $table->string('area_supervisor', 45)->nullable();
            $table->string('hora_atecion_comercio', 45)->nullable();
            $table->unsignedBigInteger('id-tipo_capacitacion');
            $table->timestamps();
            $table->foreign('id_canton', 'fk_id_canton')->references('id')->on('canton');
            $table->foreign('id-tipo_capacitacion', 'fk_id_tipo_capacitacion')->references('id')->on('capacitacion');
            $table->foreign('id_tipo_cedula', 'fk_id_tipo_cedula')->references('id')->on('cedula');
            $table->foreign('id_tipo_cliente', 'fk_id_tipo_cliente')->references('id')->on('cliente');
            $table->foreign('id_tipo_comercio', 'fk_id_tipo_comercio')->references('id')->on('comercio');
            $table->foreign('id_tipo_contrato', 'fk_id_tipo_contrato')->references('id')->on('contrato');
            $table->foreign('id_tipo_solicitud', 'fk_id_tipo_solicitud')->references('id')->on('solicitud');
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
