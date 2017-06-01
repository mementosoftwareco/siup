<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validaciones', function (Blueprint $table) {
            $table->increments('id_validacion');
			$table->integer('id_usuario');
			$table->integer('id_estado');
			$table->string('comentarios', 400);
			$table->date('fecha');
            $table->timestamps();
			$table->foreign('id_usuario')->references('id')->on('users');
			$table->foreign('id_estado')->references('id_estado')->on('estados_validacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('validaciones');
    }
}
