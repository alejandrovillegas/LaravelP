<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CanditateTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 80) as $index)
		{
            $fullName = $faker->name;
            
            $user = User::create([
               'full_name' => $fullName,
                'email' => $faker->email,
                'password' => \Hash::make(123456),
                'type' =>'candidate'
                
            ]);
            
			Canditate::create([
                'id'             => $user->id
                'website_url'   =>$faker->url,
                'description'   =>$faker->text(200),
                'job_type'      =>$faker->randonElement(['full','partial','freelance']),
                'category_id'   =>$faker->randonElement([1, 2, 3]),
                'avaliable'     => true,
                'slug'          => /Str::slug($fullname)
                

			]);
		}
	}

}