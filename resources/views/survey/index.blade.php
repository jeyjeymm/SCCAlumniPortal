@include('includes.css')

<div class="container">

	<div class="row white marg_20 pad_20">

		<form action="{{ url('survey/profiles') }}" method="post">

			{!! csrf_field() !!}

			<h5>Personal Information</h5>

			@include('profiles.includes.forms.profile_form',['action' => 'survey'])

			<button type="submit" class="btn waves-effect waved-light red darken-2 right">Next</button>

			@include('errors.form_errors')

		</form>

	</div>

</div>

@include('includes.scripts')