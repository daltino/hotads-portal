<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('country_id')->unsigned();
            $table->tinyInteger('status')->unsigned()->default(1);

            $table->foreign('country_id')->references('id')->on('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('country');
    }
}
