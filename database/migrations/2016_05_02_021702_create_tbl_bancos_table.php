<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatetblbancosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bancos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NombreB');
            $table->Integer('Pais_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pais_id')->references('id')
                ->on('tbl_paises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_bancos');
    }
}
