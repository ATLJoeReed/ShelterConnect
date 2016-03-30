<?php

use Illuminate\Database\Seeder;
use Faker\Provider;
use Faker\Provider\en_US\Address;

use App\Shelters;

class ShelterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        foreach (range(1,10) as $index) {

            $total_beds = $faker->numberBetween(40,80);
            $beds_maintenance = $faker->numberBetween(0,5);
            $beds_reserved = $faker->numberBetween(2,6);
            $beds_taken = $faker->numberBetween(10,25);
            $beds_avaliable = $total_beds - $beds_reserved - $beds_taken - $beds_maintenance;

            $lat = $faker->randomFloat( 6, 33.5, 33.9 );

            $long = $faker->randomFloat( 6, -84.2, -84.5 );


            DB::table('shelter')->insert([
                'name' => $faker->streetName . ' Shelter',

                 //location info
                'address_1' => $faker->streetAddress,
                'city' => 'Atlanta',
                'state' => 'Georgia',
                'zip_code' => $faker->postcode,
                'latitude' => $lat,
                'longitude' => $long,
                //contact info
                'phone_1' => $faker->phoneNumber,
                'phone_2' => $faker->phoneNumber,

                'beds_total' => $total_beds,
                'beds_available' => $beds_avaliable,
                'beds_taken' => $beds_taken,
                'beds_maintenance' => $beds_maintenance,
                'beds_reserved' => $beds_reserved,

                'created_at' => $faker->dateTime($min='-1 years', $max = 'now'),
                'updated_at' => $faker->dateTime($min='-30 days', $max = 'now')
            ]);
        }

    }
}
