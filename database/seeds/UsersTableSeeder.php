<?php

use Illuminate\Database\Seeder;
use Faker\Provider;
use App\Shelters;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();

        foreach (range(1,80) as $index) {

         
            $randomDigit = $faker->randomDigit;
            $isApproved = $randomDigit > 3;
            $userTypes = array('Admin','Shelter','Road');

            $userType = $faker->randomElement($userTypes);

            // if user type == 'Shelter', need to find valid shelter id
            //$shelter_id = null
            $shelter_id = NULL;

            if ( $userType == 'Shelter'){

                $shelter_id = DB::table('shelter')->orderByRaw("random()")->first()->id;

                //to do :  try eloquent approach
                //eg  Shelter::orderByRaw("RAND()")->first();
            }


            DB::table('users')->insert([
                //gen info
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
                'phone' => $faker->phoneNumber,

                //permissions + metadata
                'shelter_id' => $shelter_id,
                'is_approved' => $isApproved,
                'user_type' => $userType,
                'max_reservations' => $faker->numberBetween(5,10),
                
                
                'created_at' => $faker->dateTime($min='-1 years', $max = 'now'),
                'updated_at' => $faker->dateTime($min='-30 days', $max = 'now'),
            ]);
        }

    }
}
