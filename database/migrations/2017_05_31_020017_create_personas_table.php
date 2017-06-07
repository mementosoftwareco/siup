<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
			$table->string('id_persona', 50);
			$table->primary('id_persona');
			$table->string('nombres', 200);
			$table->string('apellidos', 200);
			$table->integer('id_tipo_identificacion');
			$table->date('fecha_expedicion_doc')->nullable();
			$table->string('lugar_exped_doc', 100)->nullable();
			$table->date('fecha_nacimiento')->nullable();
			$table->string('genero', 40)->nullable();
            $table->timestamps();
			$table->foreign('id_tipo_identificacion')->references('id_tipo_identificacion')->on('tipos_identificacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personas');
    }
}
