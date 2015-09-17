@extends('master')
@section('content')
<div class="marg_20">

    <h4>Password Reset Form</h4>

    <form method="POST" action="/password/reset">
        {!! csrf_field() !!}
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="input-field">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="input-field">
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <div class="input-field">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation">
        </div>

        <div class="input-field">
            <button type="submit" class="btn waves-effect waves-light red darken-2">
                Reset Password
            </button>
        </div>

        @include('errors.form_errors')

    </form>

</div>
@stop