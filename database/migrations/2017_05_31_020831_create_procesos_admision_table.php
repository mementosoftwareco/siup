<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcesosAdmisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procesos_admision', function (Blueprint $table) {
            $table->increments('id_proceso_admon');
			$table->integer('id_tipo_proceso');
			$table->string('id_persona', 50);
			$table->integer('id_inscripcion');
			$table->foreign('id_tipo_proceso')->references('id_tipo_proceso')->on('tipos_proceso');
			$table->foreign('id_persona')->references('id_persona')->on('personas');
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
        Schema::drop('procesos_admision');
    }
}
