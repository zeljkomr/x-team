<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 100)->nullable();
            $table->string('email', 70)->unique()->nullable();
            $table->string('password')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->string('currency', 4)->nullable();
            $table->string('gender', 7)->nullable();
            $table->string('skype', 35)->nullable();
            $table->string('mobile', 35)->nullable();
            $table->string('landline', 35)->nullable();
            $table->string('website', 200)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('street_address', 200)->nullable();
            $table->string('postal_code', 15)->nullable();
            $table->timestamp('birth')->nullable();
            $table->text('confirmation_token')->nullable();

            $table->boolean('is_client')->default(false);

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('users');
    }
}
