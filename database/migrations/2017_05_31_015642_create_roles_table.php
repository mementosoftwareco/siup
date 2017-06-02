<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id_rol');
			$table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users');
			$table->integer('id_perfil')->unsigned();
			$table->foreign('id_perfil')->references('id_perfil')->on('perfiles');
			$table->string('nombre', 100)->unique();
            $table->string('descripcion', 200);           
            $table->rememberToken();
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
        //
    }
}
