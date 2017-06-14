<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educaciones', function (Blueprint $table) {
            $table->increments('id_educacion');
			$table->string('tipo_educacion', 50);
			$table->string('nombre_inst', 300);
			$table->string('grado_obtenido', 200);
			$table->integer('anio_finalizacion');
			$table->integer('id_ciudad_inst');
			$table->string('barrio_inst', 100);
			$table->string('jornada', 2);
			$table->string('cod_icfes_inst', 10);
			$table->string('anio_icfes_inst', 4);
			$table->date('fecha_graduacion');
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
        Schema::drop('educaciones');
    }
}
