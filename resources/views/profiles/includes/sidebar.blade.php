<div class="card">

	<div class="grey center pad_20">

		<img class="z-depth-2 responsive-img circle" 
			src="{{ route('getPhoto',[

					'url' => 'profiles' . '.' . $profile->id . '.' . 'profile_picture' , 

					'name' => $profile->image_name ? $profile->image_name : 'default'

					])}}" alt="My profile picture">

	</div>

	<h5 class="center"> {{ $profile->user->name }} </h5>

	<hr />

	<div class="container-fluid center">

		@if (Auth::user()->role->name === 'user')

			@if ($profile->id === Auth::user()->profile->id)

				<a class="btn-flat waves-effect waves-red" href="{{ url('profiles/' . $profile->id . '/edit') }}">

					Edit my profile

				</a>

			@endif

		@endif

		<div>
		
		<blockquote><i>{{ $profile->about_me }}</i></blockquote>
		
		</div>
		
	</div>

</div>