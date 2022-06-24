<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('Eventos',function (Blueprint $table) {
            $table->id()->unique();
            $table->string('NombreEvento');
            $table->text('Descripcion');
            $table->foreignId('IdUsuario');
            $table->foreign('IdUsuario')->references('id')->on('users');
        });

        Schema::create('Horarios', function (Blueprint $table){
            $table->id()->unique();
            $table->date('Dia');
            $table->time('HoraInicio');
            $table->time('HoraFin');
            $table->string('Status');
            $table->foreignId('IdEvento');
            $table->foreign('IdEvento')->references('id')->on('Eventos');
        });

        Schema::create('Solicitudes', function(Blueprint $table){
            $table->id()->unique();
            $table->date('FechaEnvio');
            $table->date('FechaSolicitada');
            $table->time('HoraSolicitada');
            $table->string('NombreSolicitante');
            $table->string('ApellidoSolicitante');
            $table->bigInteger('NumeroTelefono');
            $table->string('Email');
            $table->string('Status');
            $table->foreignId('IdEvento');
            $table->foreign('IdEvento')->references('id')->on('Eventos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Administradores');
        Schema::dropIfExists('Eventos');
        Schema::dropIfExists('Horarios');
        Schema::dropIfExists('Solicitudes');
    }
};
