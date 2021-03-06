<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //run with php artisan db:seed --class=UsersTableSeeder
        $faker = Faker\Factory::create();

        $limit = 5;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([ //,
                'username' => $faker->userName,
		        'first_name' => $faker->firstName($gender = 'male'|'female'),
		        'last_name' => $faker->lastName,
		        'email' => $faker->email,
		        'password' => bcrypt('123456'),
		        'created_at' => new dateTime('now'),
		        'updated_at' => new dateTime('now'),
		        'role' => 'user',
            	'status' => 'pending',
		        'remember_token' => str_random(10),

            ]);
        }
    }
}
