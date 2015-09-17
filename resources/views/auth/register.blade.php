@extends('master')
@section('content')

<div class="marg_20 white z-depth-1 col s12 m8 l8 offset-m2 offset-l2" id="signup_container">

    <form class="pad_20" action=" {{ url('auth/register') }} " method="post">

    	{!! csrf_field() !!}

    	<input type="hidden" name="role_id" value="3">

        <a href=" {{ url('auth/login') }} " class="waves-effect waves-red btn-flat right tooltipped" data-position="bottom" data-delay="300" data-tooltip="Click here to go back to the login form.">Back to Login</a>
        
        <h5>Registration Form</h5>


        <div class="input-field">

            <input name="name" type="text" value="{{ old('name') }}" required>

            <label for="name">Full Name: </label>

        </div>


        <div class="input-field">

            <input name="email" type="email" value="{{ old('email') }}" required>

            <label for="email">Email: </label>

        </div>


        <div class="input-field">

            <input name="username" type="text" value="{{ old('username') }}" required>

            <label for="username">Username: </label>

        </div>


        <div class="input-field">

            <input name="password" type="password" required>

            <label for="password">Password: </label>

        </div>

        
        <div class="input-field">

            <input name="password_confirmation" type="password" required>

            <label for="password_confirmation">Confirm Password: </label>

        </div>


        <div class="input-field col s12 m4 l4">

            <select id="register_departments" name="department_id">

                <option disabled {{ old('department_id') === null ? "selected" : "" }} >Choose option</option>

                <option value="2" {{ old('department_id') === "2" ? "selected" : "" }} >CICS</option>

                <option value="3" {{ old('department_id') === "3" ? "selected" : "" }} >CABA</option>

                <option value="4" {{ old('department_id') === "4" ? "selected" : "" }} >CTE</option>

                <option value="5" {{ old('department_id') === "5" ? "selected" : "" }} >High School</option>

                <option value="6" {{ old('department_id') === "6" ? "selected" : "" }} >UPHS</option>

            </select>

            <label>Department: </label>

        </div>


        <div class="col s12 m4 l4">

            <label>Course: </label>
            <select id="register_courses" name="course_id" class="browser-default">

                <option disabled {{ old("course_id") === null ? "selected" : "" }} >Select course</option>
                <option value="1" {{ old("course_id") === 1 ? "selected" : "" }}>N/A</option>
                <option value="2" {{ old("course_id") === 1 ? "selected" : "" }}>BSIT</option>
                <option value="3" {{ old("course_id") === 2 ? "selected" : "" }}>CICS</option>
                <option value="4" {{ old("course_id") === 3 ? "selected" : "" }}>IS</option>
                <option value="5" {{ old("course_id") === 4 ? "selected" : "" }}>ACT</option>
                <option value="6" {{ old("course_id") === 5 ? "selected" : "" }}>BSA</option>
                <option value="7" {{ old("course_id") === 6 ? "selected" : "" }}>BSBA</option>
                <option value="8" {{ old("course_id") === 7 ? "selected" : "" }}>JSC</option>
                <option value="9" {{ old("course_id") === 8 ? "selected" : "" }}>BEED-Gen ED</option>
                <option value="0" {{ old("course_id") === 9 ? "selected" : "" }}>BEED</option>
                <option value="11" {{ old("course_id") === 10 ? "selected" : "" }}>BSED</option>

            </select>

        </div>

        <div class="col s12 m4 l4">

            <label>Batch</label>
            <select name="batch" class="browser-default">

                <option disabled {{ old('batch') === null ? "selected" : "" }} >Choose option</option>

                @for ($year = 2000; $year <= date('Y'); $year++)

                    <option value="{{ $year }}" {{ old('batch') === "$year" ? "selected" : "" }} >{{ $year }}</option>

                @endfor

            </select>

        </div>

        <div class="col s12 m12 l12">

            <button class="btn waves-effect waves-light red darken-1" type="submit">Register</button>

        </div>

        <div class="row col s12 m12 l12">

        @include('errors.form_errors')

        </div>

    </form>

</div>
<!--<script type="text/javascript" src="js/signup_form.js"></script>-->
@stop