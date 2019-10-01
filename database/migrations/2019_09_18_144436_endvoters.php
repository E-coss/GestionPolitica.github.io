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
            //$table->foreign('colegio_id')->references('colegio')->on('colegios');
            $table->string('colegio');
            $table->string('ciudad');
            $table->string('calle');
            $table->string('municipio');
            $table->string('sector');
            $table->integer('redes_id');
            //$table->foreign('redes_id')->references('id')->on('red_socials');
            $table->integer('geolocalizacion_id');
            //$table->foreign('geolocalizacion_id')->references('id')->on('geolocalizacions');
            $table->string('observaciones')->nullable(true);
            $table->Integer('influencers_id');
            //$table->foreign('influencers_id')->references('id')->on('influencers');
            $table->integer('estado')->default(1);
            $table->string('candidato');
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
