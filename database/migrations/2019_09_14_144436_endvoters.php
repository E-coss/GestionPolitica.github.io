<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Endvoters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {
        Schema::create('endvoters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('cedula')->unique();
            $table->string('telefono')->unique()->nullable(true);
            $table->string('sexo');
            $table->string('trabajo');
            $table->string('estudia');
            $table->string('colegio_id');
            $table->foreign('colegio_id')->references('colegio')->on('colegios');
            $table->string('ciudad');
            $table->string('calle');
            $table->string('municipio');
            $table->string('sector');
            $table->string('instagram')->unique()->nullable(true);
            $table->string('facebook')->unique()->nullable(true);
            $table->string('email')->unique()->nullable(true);
            $table->integer('geolocalizacion');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endvoters');
    }
}
