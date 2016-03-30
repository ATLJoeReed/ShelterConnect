<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShelterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        
        Schema::create('shelter', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->unique();

            //location - street
            $table->string('address_1', 100);
            $table->string('address_2', 100)->nullable();
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('zip_code',10);

            //location - gps
            $table->decimal('latitude', 9,6);
            $table->decimal('longitude', 9,6);

            //contact
            $table->string('phone_1', 20);
            $table->string('phone_2', 20);


            //beds info
            $table->integer('beds_total');
            $table->integer('beds_available');
            $table->integer('beds_taken');
            $table->integer('beds_maintenance');
            $table->integer('beds_reserved');

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
        Schema::drop('shelter');
    }
}
