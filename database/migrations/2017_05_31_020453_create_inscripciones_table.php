<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->increments('id_inscripcion');
			$table->string('telefono', 50)->nullable();
			$table->string('celular', 50)->nullable();
			$table->string('email', 100)->nullable();
			$table->integer('id_modalidad');
			$table->integer('id_programa')->nullable();
			$table->string('nombre_programa', 200)->nullable();
			$table->string('acepta_terms_cond', 1);
			$table->string('procedencia', 50)->nullable();
			$table->integer('id_estado_civil')->nullable();
			$table->integer('id_grupo_etnico')->nullable();
			$table->integer('id_convenio')->nullable();
            $table->timestamps();
			$table->foreign('id_modalidad')->references('id_modalidad')->on('modalidades');
			$table->foreign('id_estado_civil')->references('id_estado_civil')->on('estados_civil');
			$table->foreign('id_grupo_etnico')->references('id_grupo_etnico')->on('grupos_etnicos');
			$table->foreign('id_convenio')->references('id_convenio')->on('convenios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inscripciones');
    }
}
