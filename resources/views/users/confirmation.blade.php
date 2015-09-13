@include('includes.header')
@include('includes.css')
<div class="container">
	<div class="row">
	<div class="marg_20">
		<div class="card center pad_20"> 

			<h4>Congratulations!</h4>

			<br />

		    <h5>Password for new account {{ $new_username }} is: <b>{{ $new_password }}</b> </h5>

		    <br />

		    <a href="{{ url('users') }}" class="btn-flat waves-effect waves-light tooltipped" data-position="bottom" data-delay="300" data-tooltip="Click here to go back to users page">Back to users page</a>

		</div>
	</div>
	</div>
</div>

