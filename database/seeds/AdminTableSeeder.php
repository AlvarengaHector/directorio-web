<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder {

	public function run() {
		\DB::table('users')->insert(array (
			'first_name'	=> 'Hector',
			'last_name'		=> 'Alvarenga',
			'email'			=> 'i@hector.me',
			'password' 		=> \Hash::make('secret'),
			'type'			=> 'admin',
			'full_name'		=> "Hector Alvarenga"
		));

		\DB::table('user_profiles')->insert(array(
			'user_id' => 1,
			'birthdate' => '1988/07/19'
		));
	}

}