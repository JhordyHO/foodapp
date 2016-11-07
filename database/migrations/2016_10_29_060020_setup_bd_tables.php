<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetupBdTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //---- create --- person
        Schema::create('person', function (Blueprint $table) {
            $table->increments('idPerson');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono1');
            $table->string('telefono2');
            $table->string('celular1');
            $table->string('celular3');
            $table->char('estado',3)->default('on');
            $table->timestamps();
        });
        //----create ------- user
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            //----------------foranea user ---------------
            $table->integer('id_Person')->unsigned()->nullable();
            $table->foreign('id_Person')->references('idPerson')->on('person');
            $table->timestamps();
        });
        //-create - category
        Schema::create('category', function (Blueprint $table) {
            $table->increments('idCategory');
            $table->string('nombre_categoria');
            $table->char('estado',3)->default('on');
            $table->string('icon',100);
            $table->char('admin',3)->default('off');
            $table->timestamps();
        });
        //-------interacciones
        Schema::create('interaction', function (Blueprint $table) {
            $table->increments('idInteraction');
            $table->timestamp('fecha');
            $table->string('ip');
            $table->string('location');
            $table->char('estado',3)->default('on');
            //----------------foranea user ---------------
            $table->integer('id_User')->unsigned();
            $table->foreign('id_User')->references('id')->on('users');
        });
        //-------------createtable post ----------
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('idPost');
            $table->timestamps('fecha_post');
            $table->string('portada');
            $table->string('titulo');
            $table->mediumText('descripcion');
            $table->integer('id_User')->unsigned();
            $table->foreign('id_User')->references('id')->on('users');
        });
        //----------------createtable product ----
        Schema::create('product', function (Blueprint $table) {
            $table->increments('idProduct');
            $table->string('nombre_producto');
            $table->string('imagen1');
            $table->string('imagen2')->nullable();
            $table->string('imagen3')->nullable();
            $table->string('imagen4')->nullable();
            $table->float('precio');
            $table->char('destacado',3)->default('off');
            $table->char('estado',3)->default('on');
            $table->timestamps();
            $table->integer('id_category')->unsigned();
            $table->integer('id_post')->unsigned();
            //foreings
            $table->foreign('id_category')->references('idCategory')->on('category');
            $table->foreign('id_post')->references('idPost')->on('posts');
        });
        // Create table for storing roles
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'role_id']);
        });

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('dislay_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });
        //---------------password-reset-------------
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permission_role');
        Schema::drop('permissions');
        Schema::drop('role_user');
        Schema::drop('roles');
        Schema::drop('users');

    }
}
