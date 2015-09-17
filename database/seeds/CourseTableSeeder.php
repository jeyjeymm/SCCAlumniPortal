<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        DB::table('courses')->insert(['name' => 'N/A','department_id' => 5]);   
    	DB::table('courses')->insert(['name' => 'BSIT','department_id' => 2]);
        DB::table('courses')->insert(['name' => 'CICS','department_id' => 2]);
		DB::table('courses')->insert(['name' => 'IS','department_id' => 2]);
        DB::table('courses')->insert(['name' => 'ACT','department_id' => 2]);
        DB::table('courses')->insert(['name' => 'BSA','department_id' => 3]);
        DB::table('courses')->insert(['name' => 'BSBA','department_id' => 3]);
        DB::table('courses')->insert(['name' => 'JSC','department_id' => 3]);
        DB::table('courses')->insert(['name' => 'BEED-Gen ED','department_id' => 4]);
        DB::table('courses')->insert(['name' => 'BEED','department_id' => 4]);
        DB::table('courses')->insert(['name' => 'BSED','department_id' => 4]);

    }
}