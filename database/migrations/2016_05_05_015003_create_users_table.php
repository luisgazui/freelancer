<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('documentoi')->unique();
            $table->string('foto');
            $table->longtext('Direccion');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('documento_id')->unsigned();
            $table->integer('tipousuario_id')->unsigned();
            $table->integer('pais_id')->unsigned();
            $table->foreign('documento_id')->references('id')
                ->on('tbl_documentos');
            $table->foreign('tipousuario_id')->references('id')
                ->on('tbl_tipousuarios');
            $table->foreign('pais_id')->references('id')
                ->on('tbl_paises');
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
        Schema::drop('users');
    }
}
