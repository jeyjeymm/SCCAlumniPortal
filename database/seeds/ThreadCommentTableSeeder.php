<?php

use Illuminate\Database\Seeder;

class ThreadCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	DB::table('thread_comments')->insert([


    			'comment' => 'Enjoy the features of the website!',
    			'user_id' => 1,
    			'thread_id' => 1,
    			'created_at' => Carbon\Carbon::now(),
    			'updated_at' => Carbon\Carbon::now()

    		]);

    }
}
