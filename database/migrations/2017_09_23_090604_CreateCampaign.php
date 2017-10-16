<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('campaign', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('locations');
            $table->longText('graphicad1')->nullable();
            $table->longText('graphicad2')->nullable();
            $table->longText('videoad')->nullable();
            $table->integer('connections');
            $table->integer('used_connections');
            $table->integer('today_connections');
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
        //
    }
}
