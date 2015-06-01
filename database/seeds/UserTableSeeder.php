<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run() {

		$faker = Faker::create();

		for ($i=0; $i < 5; $i++) { 

			$firstName = $faker->firstName;
			$lastName = $faker->lastName;

			$id = \DB::table('users')->insertGetId(array (
				'first_name'	=> $firstName,
				'last_name'		=> $lastName,
				'email'			=> $faker->unique()->email,
				'password' 		=> \Hash::make('123456'),
				'type'			=> 'user',
				'full_name'		=> "$firstName $lastName"
			));

			$user = $faker->userName;

			\DB::table('user_profiles')->insert(array(
				'user_id'		=> $id,
				'bio'			=> $faker->paragraph(rand(2, 5)),
				'facebook'		=> 'https://www.facebook.com/'. $user,
				'google'		=> 'https://www.google.com/+'. $user,
				'youtube'		=> 'https://www.youtube.com/user/'. $user,
				'twitter'		=> 'http://www.twitter.com/'. $user,
				'linkedin'		=> 'https://sv.linkedin.com/in/'. $user,
				'website'		=> 'http://www.'. $faker->domainName,
				'birthdate' 	=> $faker->dateTimeBetween('-45 years', '-15 years')->format('Y-m-d')
			));
		}
	}

}