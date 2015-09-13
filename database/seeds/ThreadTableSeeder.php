<?php

use Illuminate\Database\Seeder;

class ThreadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('threads')->insert([


        		'title' => 'Welcome to SCC Alumni Portal Forum!',
        		'body' => 'Enjoy the site\'s feature!',
        		'num_views' => 0,
        		'num_comments' => 0,
        		'department_id' => 1,
        		'user_id' => 1,
        		'created_at' => Carbon\Carbon::now(),
        		'updated_at' => Carbon\Carbon::now()

        ]);
    }
}
