<!--

    @params

    Collection $users
    String $new_username
    String $new_password

-->
@extends('master')
@section('content-fluid')
<div class="container-fluid">

    <div class="row" id="content-fluid">

        @include('users.includes.forms.user_management')

        @include('users.includes.tbl_user_management')

    </div>

</div>

@stop