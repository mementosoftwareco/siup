<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefsPersonalFamiliarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refs_personal_familiar', function (Blueprint $table) {
            $table->increments('id_referencia');
			$table->string('nombres', 100);
			$table->string('apellidos', 100);
			$table->string('direccion', 300);
			$table->string('telefono', 50);
			$table->string('celular', 20);
			$table->string('email', 50);
			$table->string('parentesco', 50);
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
        Schema::drop('refs_personal_familiar');
    }
}
