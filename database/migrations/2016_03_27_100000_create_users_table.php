<?php

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

            //gen info
            $table->string('name', 200);
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('phone', 20);
            
            //permissions + metadata
            $table->boolean('is_approved');
            $table->enum('user_type', ['Admin','Shelter','Road']);
            $table->integer('max_reservations');
            $table->integer('shelter_id')->nullable();
            
            $table->foreign('shelter_id')->references('id')->on('shelter');
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
        Schema::drop('users');
    }
}
