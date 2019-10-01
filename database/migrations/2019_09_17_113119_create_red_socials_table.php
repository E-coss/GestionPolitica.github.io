<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('red_socials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('instagram')->unique()->nullable(true);
            $table->string('facebook')->unique()->nullable(true);
            $table->string('email')->unique()->nullable(true);
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
        Schema::dropIfExists('red_socials');
    }
}
