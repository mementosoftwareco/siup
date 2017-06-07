<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrevistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrevistas', function (Blueprint $table) {
            $table->increments('id_entrevista');
			$table->date('fecha_entrevista');
			$table->integer('id_proceso_admon');
			$table->foreign('id_proceso_admon')->references('id_proceso_admon')->on('procesos_admision');
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
        Schema::drop('entrevistas');
    }
}
