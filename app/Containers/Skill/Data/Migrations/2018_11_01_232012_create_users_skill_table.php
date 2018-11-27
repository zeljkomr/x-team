<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersSkillTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users_skill', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('skill_id');
            $table->integer('scale')->nullable();
            $table->string('comment')->nullable();
            $table->timestamp('started_at')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('skill_id')->references('id')->on('skills');

            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('users_skill');
    }
}
