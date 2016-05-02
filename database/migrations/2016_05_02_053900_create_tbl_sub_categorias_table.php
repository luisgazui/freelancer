<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatetblsubcategoriasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sub_categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('AreaS');
            $table->integer('Categorias_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('Categorias_id')->references('id')
                ->on('tbl_categorias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_sub_categorias');
    }
}
