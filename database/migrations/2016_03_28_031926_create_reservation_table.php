<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {

            $table->increments('id');
            $table->string('reserved_for');
            $table->dateTime('expire_time');
            $table->integer('shelter_id');
            $table->integer('user_id');
            $table->foreign('shelter_id')->references('id')->on('shelter');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('reservation');
    }
}
