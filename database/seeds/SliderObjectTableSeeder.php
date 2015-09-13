<?php

use Illuminate\Database\Seeder;

class SliderObjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slider_objects')->insert([

        		'tagline' => 'San Carlos College Alumni Portal is here!',
        		'tagline_color' => 'black-text text-lighten-4',
        		'slogan' => 'Get updated!',
        		'slogan_color' => 'black-text text-lighten-3',
        		'text_alignment' => 'right-align',
        		'image_name' => 'default.jpg',
                'mime_type' => 'image/jpeg',
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now()

        	]);
    }
}
