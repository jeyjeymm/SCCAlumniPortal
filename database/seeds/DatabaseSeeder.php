<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement("SET foreign_key_checks = 0");

        $this->call(DepartmentTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(SliderObjectTableSeeder::class);
        $this->call(ThreadTableSeeder::class);
        $this->call(ThreadCommentTableSeeder::class);

        DB::statement("SET foreign_key_checks = 1");

        Model::reguard();
    }
}
