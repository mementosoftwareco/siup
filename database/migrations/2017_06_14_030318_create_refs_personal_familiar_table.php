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
			$table->string('nombres', 300);
			$table->string('apellidos', 300);
			$table->string('telefono', 300);
			$table->string('celular', 300);
			$table->string('email', 300);
			$table->string('parentesco', 300);
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
