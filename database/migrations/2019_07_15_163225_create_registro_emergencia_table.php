<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroEmergenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_emergencia', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('personal_id');
            $table->unsignedInteger('emergencias_id');
            $table->unsignedTinyInteger('sub_estaciones');
            $table->string('emergencia', 255);
            $table->string('descripción_emergencia', 255);
            $table->string('dirección', 255);
            $table->unsignedInteger('num_escoltas');
            $table->unsignedInteger('personas_atendidas');
            $table->time('hora_salida');
            $table->time('hora_retorno');
            $table->date('fecha_reporte');
            $table->foreign('personal_id')->references('id')->on('personal')->onDelete('cascade');
            $table->foreign('emergencias_id')->references('id')->on('emergencias')->onDelete('cascade');
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
        Schema::dropIfExists('registro_emergencia');
    }
}
