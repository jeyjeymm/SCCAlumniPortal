<!--

	@Params

	Profile $profile
	String $action

-->

<div class="pad_20 white">

    <form action=" {{ url('profiles/' . $profile->id) }} " method="post" enctype="multipart/form-data">

    	{!! method_field('patch') !!}

    	{!! csrf_field() !!}

       	<h5>edit your profile:</h5>

		@include('profiles.includes.forms.profile_form')

		<button type="submit" class="btn waves-effect waves-light red darken-1">update</button>

		@include('errors.form_errors')

	</form>

</div>