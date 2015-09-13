<!--

	@Params
	
	Collection $slider_objects;
	Collection $articles;
	String $role;

-->

@extends('master')

@section('fab')
                    
    @include('articles.includes.fab')

@stop

@section('content')

	@include('slider.includes.slider')

	<h5 class="col s12 m12 l12">Announcements:</h5>

	@if (count($articles) !== 0)

	    @foreach ($articles as $article)

	    	@include('articles.includes.article_card_template')
	        
	    @endforeach

	@else

		<p>No announcement to show.

	@endif

	@if (count($articles) !== 0)

		@section('pagination')

			@include('includes.pagination',["paginator" => $articles])

		@stop

	@endif

@stop