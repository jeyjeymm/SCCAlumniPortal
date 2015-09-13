<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([

				'title' => 'Welcome to SCC Alumni Portal!',

				'description' => 'Welcome alumni! Enjoy the website!',

				'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							Vivamus quis nulla tempus justo ultricies pulvinar. 
							Donec luctus rutrum erat nec varius. 
							Pellentesque in ex leo. 
							Donec sed venenatis ipsum. 
							Praesent semper aliquet lacus, et consequat risus pharetra quis. 
							Morbi pretium eros nec odio luctus, nec efficitur erat volutpat. 
							Phasellus elementum augue ut felis interdum interdum. 
							Vivamus venenatis, nisl ut dictum condimentum, lorem arcu facilisis libero, vel porttitor quam lectus sit amet enim.

							Mauris id suscipit purus. 
							Proin ullamcorper eleifend nunc sed faucibus.
							Nunc in risus dignissim, rhoncus risus at, lacinia enim. 
							Etiam scelerisque nulla sed tempus eleifend. 
							Nam libero est, luctus eget semper non, eleifend vel nulla. 
							Integer vel iaculis est. 
							Phasellus venenatis, mauris vitae tincidunt volutpat, metus sapien fermentum ante, sed bibendum orci leo sed quam. 
							Morbi facilisis lacinia lorem non cursus.',

				'image_name' => 'default.jpeg',

				'mime_type' => 'image/jpeg',

				'department_id' => 1,

				'user_id' => 1,

				'published_at' => Carbon::now(),

				'status' => 'APPROVED',

				'created_at' => Carbon::now(),

				'updated_at' => Carbon::now()

			]);

			

			DB::table('articles')->insert([

				'title' => 'Welcome to CICS Department!',

				'description' => 'Welcome alumni! Enjoy the website!',

				'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							Vivamus quis nulla tempus justo ultricies pulvinar. 
							Donec luctus rutrum erat nec varius. 
							Pellentesque in ex leo. 
							Donec sed venenatis ipsum. 
							Praesent semper aliquet lacus, et consequat risus pharetra quis. 
							Morbi pretium eros nec odio luctus, nec efficitur erat volutpat. 
							Phasellus elementum augue ut felis interdum interdum. 
							Vivamus venenatis, nisl ut dictum condimentum, lorem arcu facilisis libero, vel porttitor quam lectus sit amet enim.

							Mauris id suscipit purus. 
							Proin ullamcorper eleifend nunc sed faucibus.
							Nunc in risus dignissim, rhoncus risus at, lacinia enim. 
							Etiam scelerisque nulla sed tempus eleifend. 
							Nam libero est, luctus eget semper non, eleifend vel nulla. 
							Integer vel iaculis est. 
							Phasellus venenatis, mauris vitae tincidunt volutpat, metus sapien fermentum ante, sed bibendum orci leo sed quam. 
							Morbi facilisis lacinia lorem non cursus.',

				'image_name' => 'default.jpeg',

				'mime_type' => 'image/jpeg',

				'department_id' => 2,

				'user_id' => 2,

				'published_at' => Carbon::now(),

				'status' => 'APPROVED',

				'created_at' => Carbon::now(),

				'updated_at' => Carbon::now()

			]);


			
			DB::table('articles')->insert([

				'title' => 'Welcome to CABA Department!',

				'description' => 'Welcome alumni! Enjoy the website!',

				'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							Vivamus quis nulla tempus justo ultricies pulvinar. 
							Donec luctus rutrum erat nec varius. 
							Pellentesque in ex leo. 
							Donec sed venenatis ipsum. 
							Praesent semper aliquet lacus, et consequat risus pharetra quis. 
							Morbi pretium eros nec odio luctus, nec efficitur erat volutpat. 
							Phasellus elementum augue ut felis interdum interdum. 
							Vivamus venenatis, nisl ut dictum condimentum, lorem arcu facilisis libero, vel porttitor quam lectus sit amet enim.

							Mauris id suscipit purus. 
							Proin ullamcorper eleifend nunc sed faucibus.
							Nunc in risus dignissim, rhoncus risus at, lacinia enim. 
							Etiam scelerisque nulla sed tempus eleifend. 
							Nam libero est, luctus eget semper non, eleifend vel nulla. 
							Integer vel iaculis est. 
							Phasellus venenatis, mauris vitae tincidunt volutpat, metus sapien fermentum ante, sed bibendum orci leo sed quam. 
							Morbi facilisis lacinia lorem non cursus.',

				'image_name' => 'default.jpeg',

				'mime_type' => 'image/jpeg',

				'department_id' => 3,

				'user_id' => 3,

				'published_at' => Carbon::now(),

				'status' => 'APPROVED',

				'created_at' => Carbon::now(),

				'updated_at' => Carbon::now()

			]);



			DB::table('articles')->insert([

				'title' => 'Welcome to CTE Department!',

				'description' => 'Welcome alumni! Enjoy the website!',

				'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							Vivamus quis nulla tempus justo ultricies pulvinar. 
							Donec luctus rutrum erat nec varius. 
							Pellentesque in ex leo. 
							Donec sed venenatis ipsum. 
							Praesent semper aliquet lacus, et consequat risus pharetra quis. 
							Morbi pretium eros nec odio luctus, nec efficitur erat volutpat. 
							Phasellus elementum augue ut felis interdum interdum. 
							Vivamus venenatis, nisl ut dictum condimentum, lorem arcu facilisis libero, vel porttitor quam lectus sit amet enim.

							Mauris id suscipit purus. 
							Proin ullamcorper eleifend nunc sed faucibus.
							Nunc in risus dignissim, rhoncus risus at, lacinia enim. 
							Etiam scelerisque nulla sed tempus eleifend. 
							Nam libero est, luctus eget semper non, eleifend vel nulla. 
							Integer vel iaculis est. 
							Phasellus venenatis, mauris vitae tincidunt volutpat, metus sapien fermentum ante, sed bibendum orci leo sed quam. 
							Morbi facilisis lacinia lorem non cursus.',

				'image_name' => 'default.jpeg',

				'mime_type' => 'image/jpeg',

				'department_id' => 4,

				'user_id' => 4,

				'published_at' => Carbon::now(),

				'status' => 'APPROVED',

				'created_at' => Carbon::now(),

				'updated_at' => Carbon::now()

			]);



			DB::table('articles')->insert([

				'title' => 'Welcome to High School Department!',

				'description' => 'Welcome alumni! Enjoy the website!',

				'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							Vivamus quis nulla tempus justo ultricies pulvinar. 
							Donec luctus rutrum erat nec varius. 
							Pellentesque in ex leo. 
							Donec sed venenatis ipsum. 
							Praesent semper aliquet lacus, et consequat risus pharetra quis. 
							Morbi pretium eros nec odio luctus, nec efficitur erat volutpat. 
							Phasellus elementum augue ut felis interdum interdum. 
							Vivamus venenatis, nisl ut dictum condimentum, lorem arcu facilisis libero, vel porttitor quam lectus sit amet enim.

							Mauris id suscipit purus. 
							Proin ullamcorper eleifend nunc sed faucibus.
							Nunc in risus dignissim, rhoncus risus at, lacinia enim. 
							Etiam scelerisque nulla sed tempus eleifend. 
							Nam libero est, luctus eget semper non, eleifend vel nulla. 
							Integer vel iaculis est. 
							Phasellus venenatis, mauris vitae tincidunt volutpat, metus sapien fermentum ante, sed bibendum orci leo sed quam. 
							Morbi facilisis lacinia lorem non cursus.',

				'image_name' => 'default.jpeg',

				'mime_type' => 'image/jpeg',

				'department_id' => 5,

				'user_id' => 5,

				'published_at' => Carbon::now(),

				'status' => 'APPROVED',

				'created_at' => Carbon::now(),

				'updated_at' => Carbon::now()

			]);
    }
}
