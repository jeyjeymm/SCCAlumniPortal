<!--

	@Params

	Profile $profile
	String $action

-->
@extends('master')
@section('content')

	<div class="white marg_20 pad_20">

	    <form action=" {{ url('profiles/' . $profile->id) }} " method="post" enctype="multipart/form-data">

	    	{!! method_field('patch') !!}

	    	{!! csrf_field() !!}

	       	<h5>edit your profile:</h5>

			@include('profiles.includes.forms.profile')

			<button type="submit" class="btn waves-effect waves-light red darken-1">update</button>

			@include('errors.form_errors')

		</form>

	</div>

@stop