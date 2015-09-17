@extends('master')
@section('content')

<div class="marg_20 row center">

	<img class="responsive-img" src=" {{ url('images/logo.png') }} " alt="logo"/>

</div>

<div class="white z-depth-1 col s12 m6 l6 offset-m3 offset-l3">

        <form class="pad_20" action=" {{ url('auth/login') }} " method="post">

            <div class="row">

	            <div class="left">

		            <h5>Login</h5>

		            {!! csrf_field() !!}

	            </div>
	            <div class="right">

            		Remember?

		            <div class="switch">
					    <label>
					      No
					      <input type="checkbox" name="remember">
					      <span class="lever"></span>
					      Yes
					    </label>
				  	</div>
            	</div>

            </div>
            
            <div class="input-field">

                <input name="username" type="text" value="{{ old('username') }}" required>

                <label for="username">Username: </label>

            </div>


            <div class="input-field">

                <input name="password" type="password" required>

                <label for="password">Password: </label>

            </div>

            <div>

            	<button class="waves-effect waves-light btn red darken-1" type="submit">Login</button>

            	<a href=" {{ url('auth/register') }} " class="waves-effect waves-red btn-flat tooltipped" data-position="bottom" data-delay="300" data-tooltip="Click here to go to the registration form.">Register</a>
	       		
	            <div class="input-field">

       				<a href=" {{ url('password/email') }} " class="tooltipped" data-position="bottom" data-delay="300" data-tooltip="Click here to go to the password reset form.">Password Reset</a>
       		
       			</div>       		

       		</div>

            @include('errors.form_errors')
          

        </form>

</div>

@stop