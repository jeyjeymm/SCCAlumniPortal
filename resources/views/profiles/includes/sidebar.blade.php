<div id="sidebar">

	<div class="card center">

		<div class="pad_20" style="background-image: url( {{ url('images/gradient.png') }} );background-repeat: repeat-x;">

			<img class="z-depth-2 responsive-img circle" 
				src="{{ route('getPhoto',[

						'url' => 'profiles' . '.' . $profile->id . '.' . 'profile_picture' , 

						'name' => $profile->image_name ? $profile->image_name : 'default'

						])}}" alt="My profile picture">

		</div>

		<h5 class="black-text"> {{ $profile->user->name }} </h5>

		<li class="divider"></li>

			@if (Auth::user()->profile()->first())

				@if ($profile->id === Auth::user()->profile->id)

					<a class="btn-flat waves-effect waves-red" href="{{ url('profiles/' . $profile->id . '/edit') }}">

						Edit my profile

					</a>

				@endif

			@endif
			
		<blockquote><i>{{ $profile->about_me }}</i></blockquote>
			
	</div>

	@include('profiles.includes.email_a_friend')

</div>