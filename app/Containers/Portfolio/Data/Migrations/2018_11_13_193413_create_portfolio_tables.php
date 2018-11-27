<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePortfolioTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('gallery_id')->nullable();
            $table->string('name');
            $table->string('url');
            $table->text('description');
            $table->integer('scale');

            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}
