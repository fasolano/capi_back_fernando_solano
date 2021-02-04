<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDomicilioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_domicilio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('domicilio', 100);
            $table->string('numero_exterior', 10);
            $table->string('colonia', 60);
            $table->string('cp', 10);
            $table->string('ciudad', 60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_domicilio');
    }
}
