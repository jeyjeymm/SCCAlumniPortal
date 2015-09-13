<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('departments')->insert(['name' => 'Public']);
        DB::table('departments')->insert(['name' => 'CICS']);
        DB::table('departments')->insert(['name' => 'CABA']);
        DB::table('departments')->insert(['name' => 'CTE']);
        DB::table('departments')->insert(['name' => 'High School']);
        DB::table('departments')->insert(['name' => 'UPHS']);
    }
}