<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleEntrevistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_entrevistas', function (Blueprint $table) {
            $table->increments('id_detalle_entrevista');
			$table->integer('id_entrevista');
			$table->integer('id_respuesta');
			$table->integer('id_pregunta');
            $table->timestamps();
			$table->foreign('id_entrevista')->references('id_entrevista')->on('entrevistas');
			$table->foreign('id_respuesta')->references('id_respuesta')->on('respuestas');
			$table->foreign('id_pregunta')->references('id_pregunta')->on('preguntas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_entrevistas');
    }
}
