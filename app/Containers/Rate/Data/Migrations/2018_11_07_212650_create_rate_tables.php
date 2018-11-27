<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRateTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('user_id');

            $table->float('hourly_rate', 5, 2);
            $table->string('minimum_hour', 10);
            $table->string('rate_comment', 100);

            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}
