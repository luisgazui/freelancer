<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatetbltitulosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_titulos', function (Blueprint $table) {
            $table->increments('id');
            $table->String('DescripcionT');
            $table->integer('Anno_est');
            $table->string('tipo');
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
        Schema::drop('tbl_titulos');
    }
}
