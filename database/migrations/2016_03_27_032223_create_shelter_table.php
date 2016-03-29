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

            //location info
            $table->string('address1', 100);
            $table->string('address2', 100)->nullable();
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('zip_code',10);

            //contact info
            $table->string('phone1', 20);
            $table->string('phone2', 20);


            //bed info
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
        Schema::drop('Shelter');
    }
}
