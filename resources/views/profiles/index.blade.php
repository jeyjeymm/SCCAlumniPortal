<!--

	@Params

	Profile $profile
	String $action

-->

@extends('master')

@section('fab')
                    
    @include('profiles.includes.fab')

@stop

@section('content')

	<div id="profiles_progress_bar" class="progress" style="display: none">

	    <div class="indeterminate"></div>

	</div>

	<div id="profile_search_result" style="display: none">
		
		<ul class="collection with-header">

			<li id="profile_search_result_header" class="collection-header"> Search results for: </li>

			<!-- Append search results from javascript -->
			<div id="profile_search_result_list"></div>

		</ul>

	</div>

	<div id="profile_info">

		<div class="col s12 m4 l4">

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

					@if (Auth::user()->role->id === 3)

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

		</div>

		<div class="col s12 m8 l8">

			<div id="profiles_dashboard" class="row card transparent">

				<input id="profile_id" type="hidden" value="{{ $profile->user->id }}">

				<div id="btn_profile_about" class="col s4 m4 l4 hoverable btn waves-effect waves-teal red darken-1 white-text">
					
					<div class="center">About</div>

				</div>
				
				<div id="btn_profile_threads" class="col s4 m4 l4 hoverable btn waves-effect waves-orange blue darken-2 white-text">
					
					<div class="center">Threads</div>

				</div>

					
				<div id="btn_profile_work" class="col s4 m4 l4 hoverable btn waves-effect waves-yellow orange lighten-1 white-text">
					
					<div class="center">Work</div>

				</div>

			</div>

			<div class="row">

				<div id="profiles_content">
			
					@if ($action === 'edit')

						@include('profiles.edit')

					@else

						@include('profiles.info')

					@endif

				</div>

			</div>

		</div>

	</div>

@stop
