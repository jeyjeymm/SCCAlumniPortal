<!--

	@Params

	String $action

-->

@extends('master')
@section('content')

	<div class="marg_20 white z-depth-1 col s12 m12 l12">
	
	    <form class="marg_20" action="{{ url('profiles') }}" method="post" enctype="multipart/form-data">
	
	    	{!! csrf_field() !!}
	
	       	<h5>create your profile:</h5>
	
			@include('profiles.includes.forms.profile_form')

			<button type="submit" class="btn waves-effect waves-light red darken-1">finish</button>

			@include('errors.form_errors')

		</form>
	
	</div>

@stop