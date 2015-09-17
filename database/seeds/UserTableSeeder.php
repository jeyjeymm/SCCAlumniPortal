<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([

				'name' => 'San Carlos College Admin',

				'email' => 'admin@yahoo.com',

				'username' => 'admin',

				'password' => bcrypt('pass'),

				'department_id' => 1,

				'course_id' => 1,

				'role_id' => 1,

				'created_at' => Carbon::now(),

				'updated_at' => Carbon::now()

			]);


        DB::table('users')->insert([

				'name' => 'CICS Editor',

				'email' => 'cics_editor@yahoo.com',

				'username' => 'cics_editor',

				'password' => bcrypt('pass'),

				'department_id' => 2,

				'course_id' => 1,

				'role_id' => 2,

				'created_at' => Carbon::now(),

				'updated_at' => Carbon::now()

			]);


		DB::table('users')->insert([

				'name' => 'CABA Editor',

				'email' => 'caba_editor@yahoo.com',

				'username' => 'caba_editor',

				'password' => bcrypt('pass'),

				'department_id' => 3,

				'course_id' => 1,

				'role_id' => 2,

				'created_at' => Carbon::now(),

				'updated_at' => Carbon::now()

			]);


		DB::table('users')->insert([

				'name' => 'CTE Editor',

				'email' => 'cte_editor@yahoo.com',

				'username' => 'cte_editor',

				'password' => bcrypt('pass'),

				'department_id' => 4,

				'course_id' => 1,

				'role_id' => 2,

				'created_at' => Carbon::now(),

				'updated_at' => Carbon::now()

			]);


		DB::table('users')->insert([

				'name' => 'High School Editor',

				'email' => 'hs_editor@yahoo.com',

				'username' => 'hs_editor',

				'password' => bcrypt('pass'),

				'department_id' => 5,

				'course_id' => 1,

				'role_id' => 2,

				'created_at' => Carbon::now(),

				'updated_at' => Carbon::now()

			]);


		DB::table('users')->insert([

				'name' => 'Joel Jeremy M. Marquez',

				'email' => 'joeljeremy.marquez@yahoo.com',

				'username' => 'jjmm',

				'password' => bcrypt('pass'),

				'department_id' => 2,

				'course_id' => 2,

				'role_id' => 3,

				'batch' => 2015,

				'created_at' => Carbon::now(),

				'updated_at' => Carbon::now()

			]);

    }
}
