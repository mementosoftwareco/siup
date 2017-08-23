<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CentrosPoblado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centros_poblado', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nombre', 50);
			$table->string('codigo', 30);
			$table->string('codigo_municipio', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
