<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colegios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provincia');
            $table->string('municipio');
            $table->string('colegio')->index();
            $table->integer('cod_recinto');
            $table->string('descripcion');
            $table->string('direccion');
            $table->integer('inscritos');
            $table->integer('emitidos');
            $table->integer('validos');
            $table->integer('nulos');
            $table->integer('obs');
            $table->integer('pld');
            $table->integer('prd');
            $table->integer('prsc');
            $table->integer('apd');
            $table->integer('bis');
            $table->integer('prsd');
            $table->integer('pun');
            $table->integer('ptd');
            $table->integer('pqdc');
            $table->integer('plrd');
            $table->integer('udc');
            $table->integer('pri');
            $table->integer('pvud');
            $table->integer('prn');
            $table->integer('miuca');
            $table->integer('asd');
            $table->integer('pdp');
            $table->integer('ppc');
            $table->integer('phd');
            $table->integer('fnp');
            $table->integer('pap');
            $table->integer('moda');
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
        Schema::dropIfExists('colegios');
    }
}
