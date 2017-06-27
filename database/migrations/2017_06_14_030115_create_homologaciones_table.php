<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomologacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homologaciones', function (Blueprint $table) {
            $table->increments('id_homologacion');
			$table->string('titulo', 200);
			$table->string('institucion', 200);
			$table->integer('id_ciudad');
			$table->date('fecha_finalizacion');
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
        Schema::drop('homologaciones');
    }
}
