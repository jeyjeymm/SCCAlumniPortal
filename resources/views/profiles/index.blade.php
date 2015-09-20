<!--

	@Params

	Profile $profile

-->

@extends('master')

@section('fab')
                    
    @include('profiles.includes.fab')

@stop

@section('content')

	<div id="profiles">

		@include('includes.progress_bar')

		@include('profiles.includes.search_results')

		<div id="info">

			<div class="col s12 m4 l4">

				@include('profiles.includes.sidebar')

			</div>

			<div class="col s12 m8 l8">

				@include('profiles.includes.dashboard')

				<div class="row" id="content">

					@include('profiles.includes.info')

				</div>

			</div>

		</div>

	</div>

@stop

@section('page_scripts')

	@include('includes.selected_scripts',['scripts' => ['profiles']])

@stop
