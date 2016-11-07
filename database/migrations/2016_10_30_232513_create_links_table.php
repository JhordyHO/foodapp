<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('idLink');
            $table->string('icono');
            $table->string('url');
            $table->string('nombre_url',100);
            $table->char('destacado',3)->default('off');
            $table->char('new',3)->default('on');
            $table->char('estado',3)->default('on');
            $table->char('auth',3)->default('off');
            $table->integer('id_category')->unsigned();
            $table->foreign('id_category')->references('idCategory')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('links');
    }
}
