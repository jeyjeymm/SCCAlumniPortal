<!--

    @Params

    String $action;
    Array $articleFormData['buttonText','buttonIcon'];

-->

@extends('master')

@section('fab')
                    
    @include('articles.includes.fab')

@stop

@section('content')

	<form action=" {{ url('articles') }}" method="post" enctype="multipart/form-data">

		{!! csrf_field() !!}

        <h5>Create new article:</h5>  

		@include('articles.includes.forms.article_form')

    </form>

    @include('errors.form_errors')

@stop
