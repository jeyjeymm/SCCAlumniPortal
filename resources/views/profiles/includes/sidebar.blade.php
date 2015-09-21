<div id="sidebar">

	<div class="card center">

		<div class="pad_20" style="background-image: url( {{ url('images/gradient.png') }} );background-repeat: repeat-x;">

			<img class="z-depth-2 responsive-img circle" 
				src="{{ route('getPhoto',[

						'url' => 'profiles' . '.' . $profile->id . '.' . 'profile_picture' , 

						'name' => $profile->image_name ? $profile->image_name : 'default'

						])}}" alt="My profile picture">

		</div>

		<h5 class="black-text marg_20"> {{ $profile->user->name }} </h5>

			@if (Auth::user()->profile()->first())

				@if ($profile->id === Auth::user()->profile->id)

					<li class="divider"></li>

					<a class="btn-flat waves-effect waves-red marg_20" href="{{ url('profiles/' . $profile->id . '/edit') }}">

						Edit my profile

					</a>

				@endif

			@endif
			
	</div>

	@if ($profile->about_me !== '')

		<div class="card">

			<div class="marg_20">

				<blockquote><i>{{ $profile->about_me }}</i></blockquote>

			</div>

		</div>

	@endif

	@if (Auth::user()->profile()->first())

		@if ($profile->id === Auth::user()->profile->id)

			@include('profiles.includes.email_a_friend')

		@endif

	@endif

</div>