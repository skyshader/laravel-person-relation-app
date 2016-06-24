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
        DB::table('users')->insert([
        	['name' => 'Justin Timberlake'],
	        ['name' => 'Taylor Swift'],
        	['name' => 'Drake'],
        	['name' => 'Lukas Graham'],
        	['name' => 'Chris Brown'],
        	['name' => 'Blake Shelton']
        ]);
    }
}
