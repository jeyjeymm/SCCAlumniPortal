@if (Auth::check())

	@if (Auth::user()->role_id !== 3)

		<?php

			//Declare FAB contents for this page
			$fab_array = [

				[

					'color' => 'red darken-2',
					'tooltip' => 'Click here to open up other actions.',
					'icon' => 'add'

				],

				[

					'href' => 'slider/create',
					'color' => 'green',
					'tooltip' => 'Click here to manage the site\'s slider.',
					'icon' => 'photo'

				],

				[

					'href' => 'users',
					'color' => 'blue',
					'tooltip' => 'Click here to manage users.',
					'icon' => 'person'

				],

				[

					'href' => 'survey/list',
					'color' => 'orange darken-2',
					'tooltip' => 'Click here to view survey results.',
					'icon' => 'view_list'

				],

				[

					'href' => 'articles/create',
					'color' => 'yellow darken-2',
					'tooltip' => 'Click here to create an article.',
					'icon' => 'create'

				]

			];


				/*if (Auth::check()) {

				if (Auth::user()->role->id !== 3) {



				} else {

					//Declare FAB contents for this page
					$fab_array = [

						[

							'href' => 'articles/create',
							'color' => 'red darken-2',
							'tooltip' => 'Click here to create an article.',
							'icon' => 'create'


						]

					];

				}
			}*/

		?>

		@include('includes.fab')

	@endif

@endif