<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionesGeograficasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicaciones_geograficas', function (Blueprint $table) {
            $table->increments('id_ubicacion');
			$table->string('direccion', 300);
			$table->integer('id_departamento');
			$table->integer('id_ciudad');
			$table->string('municipio', 200);
			$table->string('barrio', 200);
			$table->integer('estrato');
			$table->integer('id_inscripcion');
			$table->foreign('id_inscripcion')->references('id_inscripcion')->on('inscripciones');
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
        Schema::drop('ubicaciones_geograficas');
    }
}
