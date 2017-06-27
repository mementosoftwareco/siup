<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricosProcesoAdmisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos_proceso_admision', function (Blueprint $table) {
            $table->increments('id_historico_proceso');
			$table->integer('id_usuario');
			$table->integer('id_estado');
			$table->integer('id_proceso_admon');
			$table->string('comentarios', 400);
			$table->date('fecha');
            $table->timestamps();
			$table->foreign('id_usuario')->references('id')->on('users');
			$table->foreign('id_estado')->references('id_estado')->on('estados_proceso_admision');
			$table->foreign('id_proceso_admon')->references('id_proceso_admon')->on('procesos_admision');
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
