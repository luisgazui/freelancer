<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatetblplanesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_planes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreplan');
            $table->double('costo');
            $table->integer('vigencia');
            $table->string('imagen');
            $table->integer('numeroproyectos');
            $table->integer('numeroexperiencias');
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
        Schema::drop('tbl_planes');
    }
}
