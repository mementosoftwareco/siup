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
			$table->string('grado_obtenido', 200)->nullable();
			$table->integer('anio_finalizacion')->nullable();
			$table->integer('id_ciudad_inst')->nullable();
			$table->string('barrio_inst', 100)->nullable();
			$table->string('programa_pregrado', 400)->nullable();
			$table->string('jornada', 2)->nullable();
			$table->string('cod_icfes_inst', 10)->nullable();
			$table->string('anio_icfes_inst', 4)->nullable();
			$table->date('fecha_graduacion')->nullable();
			$table->integer('id_inscripcion')->nullable();
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
