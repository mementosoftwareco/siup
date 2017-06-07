<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id_documento');
			$table->integer('id_tipo_documento');
			$table->integer('id_proceso_admon');
			$table->string('nombre', 300);
			$table->string('ubicacion', 400);
			$table->date('fecha_creacion');
            $table->timestamps();
			$table->foreign('id_tipo_documento')->references('id_tipo_documento')->on('tipos_documento');
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
        Schema::drop('documentos');
    }
}
