<!--

	@Params

	String $action

-->

@extends('master')
@section('content')

	<div class="white marg_20 pad_20">

		<h5>create your profile:</h5>
	
	    <form action="{{ url('profiles') }}" method="post" enctype="multipart/form-data">
	
	    	{!! csrf_field() !!}
	
			@include('profiles.includes.forms.profile_form')

			<button type="submit" class="btn waves-effect waves-light red darken-1">finish</button>

			@include('errors.form_errors')

		</form>
	
	</div>

@stop