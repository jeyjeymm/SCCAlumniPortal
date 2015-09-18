<!--

    @params

    Collection $users
    String $new_username
    String $new_password

-->
@extends('master')
@section('content-fluid')
<div class="container-fluid">

	<div id="users">

	    <div class="row">

	        @include('users.includes.forms.user_management')

	        @include('users.includes.tbl_user_management')

	    </div>

    </div>

</div>

@stop

@section('page_scripts')

	@include('includes.selected_scripts',['scripts' => ['user_management']])

@stop