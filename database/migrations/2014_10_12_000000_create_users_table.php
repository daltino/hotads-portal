<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->longText('profile_image')->nullable();
            $table->string('activation_code')->nullable();
            $table->boolean('verify_email')->default(0);
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->integer('state_id')->unsigned()->default(0);
            $table->integer('country_id')->unsigned()->default(0);
            $table->string('hash')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
