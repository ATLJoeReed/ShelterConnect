<?php

use Illuminate\Database\Seeder;
use Faker\Provider;
use App\Shelters;

class ReservationTableSeeder extends Seeder
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

            $shelter_id = DB::table('shelter')->orderByRaw("random()")->first()->id;
            $user_id = DB::table('users')->where('user_type','Shelter')->orderByRaw("random()")->first()->id;

            DB::table('reservation')->insert([
                'reserved_for' => $faker->name,
                'expire_time' =>  $faker->dateTime($min = 'now', $max = '+100 minutes'),
                
                'shelter_id'=> $shelter_id,
                'user_id' => $user_id,
 
                'created_at' => $faker->dateTime($min='-60 minutes', $max = 'now'),
                'updated_at' => $faker->dateTime($min='-60 minutes', $max = 'now')
             ]);
        }

        //todo: update shelter table to
        //  compute set beds_reserved, re-compute #beds_reserved, #availbale
        // ( possibly call compute proc )

    }
}
