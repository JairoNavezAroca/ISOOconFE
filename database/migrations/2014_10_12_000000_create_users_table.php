<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Usuarios;
use App\Cliente;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('cliente');
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('usu_codigo');
            $table->string('usu_nombre',8);
            $table->string('usu_password',8);
            $table->boolean('usu_estado');
        });
        $u = new Usuarios();
        $u->usu_nombre = 'juan';
        $u->usu_password = '123456';
        $u->usu_estado = true;
        $u->save();
        $u = new Usuarios();
        $u->usu_nombre = 'admin';
        $u->usu_password = 'admin';
        $u->usu_estado = true;
        $u->save();
        /*
            php artisan make:model Usuarios -c
            crea modelo y con -c el controlador
        */
        Schema::create('cliente', function (Blueprint $table) {
            $table->bigIncrements('codigo');
            $table->string('dni');
            $table->string('apellidos');
            $table->string('nombres');
            $table->string('direccion');
            $table->date('fechanacimiento');
            $table->boolean('usu_estado');
        });


/*
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('cliente');
    }
}
