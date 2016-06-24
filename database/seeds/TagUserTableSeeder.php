<?php

use Illuminate\Database\Seeder;

class TagUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag_user')->insert([
        	[
        		'user_id' => 1,
        		'relative_id' => 2,
        		'tag_id' => 2
        	],
        	[
        		'user_id' => 1,
        		'relative_id' => 3,
        		'tag_id' => 1
        	],
        	[
        		'user_id' => 3,
        		'relative_id' => 2,
        		'tag_id' => 3
        	],
        	[
        		'user_id' => 4,
        		'relative_id' => 5,
        		'tag_id' => 4
        	]
        ]);
    }
}
