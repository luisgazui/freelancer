<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatetblcodpaisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_codpais', function (Blueprint $table) {
            $table->increments('id');
            $table->char('codpais', 4);
            $table->integer('pais_id')->unsigned();
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
        Schema::drop('tbl_codpais');
    }
}
