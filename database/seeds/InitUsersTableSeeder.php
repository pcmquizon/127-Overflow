<?php

use Illuminate\Database\Seeder;

class InitUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//run with php artisan db:seed --class=AdminUsersTableSeeder
        DB::table('users')->insert([ //,
                'username' => 'overflow',
		        'first_name' => 'Jaime',
		        'last_name' => 'Canicula',
		        'email' => 'canicula@gmail.com',
		        'password' => bcrypt('1234'),
		        'created_at' => new dateTime('2015-11-15 00:00:00'),
		        'updated_at' => new dateTime('now'),
		        'role' => 'admin',
            	'status' => 'approved',
            	'profile_picture_path' => '/public/profile_pictures/default.png',
		        'remember_token' => str_random(10),
            ]);

        DB::table('users')->insert([ //,
                'username' => 'pcmquizon',
		        'first_name' => 'Pia',
		        'last_name' => 'Canicula',
		        'email' => 'quizon@gmail.com',
		        'password' => bcrypt('1234'),
		        'created_at' => new dateTime('2015-11-15 00:00:00'),
		        'updated_at' => new dateTime('now'),
		        'role' => 'admin',
            	'status' => 'approved',
            	'profile_picture_path' => '/public/profile_pictures/default.png',
		        'remember_token' => str_random(10),
            ]);

		DB::table('users')->insert([ //,
                'username' => 'testuser1',
		        'first_name' => 'Juana',
		        'last_name' => 'dela Cruz',
		        'email' => 'alpha@testuser.com',
		        'password' => bcrypt('123456'),
		        'created_at' => new dateTime('2015-11-16 00:00:00'),
		        'updated_at' => new dateTime('now'),
		        'role' => 'user',
            	'status' => 'pending',
            	'profile_picture_path' => '/public/profile_pictures/default.png',
		        'remember_token' => str_random(10),
            ]);

		DB::table('users')->insert([ //,
                'username' => 'testuser2',
		        'first_name' => 'Juan',
		        'last_name' => 'dela Cruz',
		        'email' => 'beta@testuser.com',
		        'password' => bcrypt('123456'),
		        'created_at' => new dateTime('2015-11-17 00:00:00'),
		        'updated_at' => new dateTime('now'),
		        'role' => 'user',
            	'status' => 'pending',
            	'profile_picture_path' => '/public/profile_pictures/default.png',
		        'remember_token' => str_random(10),
            ]);
            
		DB::table('users')->insert([ //,
                'username' => 'testuser3',
		        'first_name' => 'ICS',
		        'last_name' => 'PC Lab',
		        'email' => 'useruser@testuser.com',
		        'password' => bcrypt('123456'),
		        'created_at' => new dateTime('2015-11-18 00:00:00'),
		        'updated_at' => new dateTime('now'),
		        'role' => 'user',
            	'status' => 'pending',
            	'profile_picture_path' => '/public/profile_pictures/default.png',
		        'remember_token' => str_random(10),
            ]);
    }
}
