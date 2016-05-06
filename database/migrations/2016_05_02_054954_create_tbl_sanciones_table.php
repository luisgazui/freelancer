<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatetblsancionesTable extends Migration
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
            $table->String('DescripcionS');
            $table->integer('Duracion_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Duracion_id')->references('id')
                ->on('tbl_duracions');
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
