<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatetbldocumentosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Documento');
            $table->integer('Pais_id')->unsigned();
            $table->Boolean('Empresa');
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
        Schema::drop('tbl_documentos');
    }
}
