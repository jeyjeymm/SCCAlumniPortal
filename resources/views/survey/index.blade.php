@include('includes.css')

<div class="container">

	<div class="row white marg_20 pad_20">

		<form action="{{ url('survey/profiles') }}" method="post">

			{!! csrf_field() !!}

			<h5>Personal Information</h5>

			@include('profiles.includes.forms.personal_info_form')

			<button type="submit" class="btn waves-effect waved-light red darken-2">

				<i class="material-icons right">arrow_forward</i>

					Next

			</button>

		</form>

		@include('errors.form_errors')

	</div>

</div>

@include('includes.scripts')