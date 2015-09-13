<!--

    @Params

    Article $article;
    String $action;
    Array $articleFormData['buttonText','buttonIcon'];

-->

@extends('master')

@section('fab')
                    
    @include('articles.includes.fab')

@stop

@section('content')

	<form action=" {{ url( 'articles/' . $article->id ) }} " method="post" enctype="multipart/form-data">

		{!! method_field('patch') !!}

		{!! csrf_field() !!}

        <h5>Edit: <a href=" {{ url( 'articles/' . $article->id ) }} "><i>{{ $article->title }}</i></a></h5>  

		@include('articles.includes.forms.article_form')

    </form>

    @include('errors.form_errors')

@stop