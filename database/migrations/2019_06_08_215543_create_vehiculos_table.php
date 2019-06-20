<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imagen', 150);
            $table->string('vehiculo_unidad', 6);
            $table->string('num_serie', 8);
            $table->string('inventario', 8);
            $table->string('no_motor', 8);
            $table->string('marca', 8);
            $table->string('modelo', 8);
            $table->string('placas', 6);
            $table->unsignedTinyInteger('estatus_vehiculo');
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
        Schema::dropIfExists('vehiculos');
    }
}
