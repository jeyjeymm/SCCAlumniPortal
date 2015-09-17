@extends('master')
@section('content')
<div class="marg_20">

    <h4>Password Reset Form</h4>

    <form class="pad_20" method="POST" action="{{ url('password/email') }}">

        {!! csrf_field() !!}

        <div class="input-field">

            <input type="email" name="email" value="{{ old('email') }}">
            <label>Email</label>

        </div>

        @if (session()->has('status'))

            <div class="input-field">

                {{ session('status') }}

            </div>

        @endif

        <div class="input-field">

            <button type="submit" class="btn waves-effect waves-light red darken-2">

                Send Password Reset Link

            </button>

        </div>

        @include('errors.form_errors')

    </form>
</div>
@stop