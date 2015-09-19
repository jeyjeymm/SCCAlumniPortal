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

<div id="profiles">

	<div id="progress_bar" class="progress" style="display: none">

	    <div class="indeterminate"></div>

	</div>

	@include('profiles.includes.search_results')

	<div id="info">

		<div class="col s12 m4 l4">

			@include('profiles.includes.sidebar')

		</div>

		<div class="col s12 m8 l8">

			@include('profiles.includes.dashboard')

			<div class="row" id="content">
			
				@if ($action === 'edit')

					@include('profiles.edit')

				@elseif ($action === 'info')

					@include('profiles.includes.info')

				@endif

			</div>

		</div>

	</div>

</div>

@stop

@section('page_scripts')

	@include('includes.selected_scripts',['scripts' => ['profiles']])

@stop
