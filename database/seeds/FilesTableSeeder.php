<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FilesTableSeeder extends Seeder {

	public function run() {
		
		$faker = Faker::create();

		for ($i=0; $i < 5; $i++) { 
			$original_filename	= $faker->randomNumber($nbDigits = NULL);
			$fileExtension = $faker->fileExtension;
			
			\DB::table('files')->insert(array (
				'name'				=> $faker->unique()->md5 . '.' . $fileExtension,
				'mime'				=> $faker->mimeType,
				'original_filename'	=> $original_filename,
				'filepath'			=> 'files',
				'size'				=> $faker->numberBetween(0,10000000),
				'extension'			=> $fileExtension,
				'description'		=> $faker->paragraph($nbSentences = 3)
			));
		}

	}

}