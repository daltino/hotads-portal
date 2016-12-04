<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('country_code');
            $table->string('dial_code')->default(0);
            $table->string('time_zone')->default(0);
            $table->enum('region',['Africa','Antarctica','Asia','Europe','North America','Oceania', 'South America']);
            $table->string('currency_symbol')->nullable();
            $table->tinyInteger('status')->unsigned()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('country');
    }
}
