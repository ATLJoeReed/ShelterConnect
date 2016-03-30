<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
		$this->call('ShelterTableSeeder');
		
        $this->call('UsersTableSeeder');
		
        $this->call('ReservationTableSeeder');
        // $this->call(UserTableSeeder::class);
    }
}
