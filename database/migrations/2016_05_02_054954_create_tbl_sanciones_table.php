<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Createtbl_sancionesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sanciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Severidad');
            $table->String('Descripcion');
            $table->integer('Duracion_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_sanciones');
    }
}
