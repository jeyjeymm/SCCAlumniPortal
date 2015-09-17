<!--

	@params

	Thread $thread
	Collection $comments

-->

@extends('master')

@section('fab')
                    
    @include('threads.includes.comments_fab')

@stop

@section('content')

	<?php

		if ($thread->user->profile !== null) {

			$profile_id = $thread->user->profile->id;
			$profile_link = url('profiles/'.$profile_id);
			$url = 'profiles' . '.' . $profile_id . '.' . 'profile_picture';
			$name = $thread->user->profile->image_name;

		} else {

			$profile_link = '#';
			$url = 'profiles';
			$name = 'default.jpg';
		}

	?>

	<ul class="collection with-header">   

	    <li class="collection-header red darken-1">

	    	<a href="{{ url('threads') }}"><i class="material-icons white-text">arrow_back</i></a>

	    	<h5 style="display: inline-block" class="white-text">{{ $thread->title }}</h5> 

	    	<p class="white-text">
	    		<a class="white-text" href="{{ $profile_link }}"> {{ $thread->user->name }} </a> <br />
	    		{{ $thread->updated_at->diffForHumans() }}
	    	</p>

	    </li>

	    <li class="collection-item avatar">

	    	<img src="{{ route('getPhoto',['url' => $url,'name' => $name]) }}" 
	    			alt="Avatar" class="circle"/>

	    	<p> {!! $thread->body !!} </p>

	    </li>

	    @if ($comments->all())

	    	@include('includes.comment_modal')

		    @foreach ($comments as $comment)

		    	@include('includes.comment')

		    @endforeach

		    <div class="input-field">

		    	@include('includes.pagination',['paginator' => $comments])
		    	
		    </div>

		@else

			<li class="collection-item center red white-text">Be the first to comment!</li>

		@endif


	    <li class="comment_container collection-item" style="display:none">

	    	<h5 class="center">Post a comment...</h5>

	        <form id="form_comment" action=" {{ url ('threads/'.$thread->id.'/comments') }} " method="post">

	        	<input class="laravel_method" type="hidden">

                {!! csrf_field() !!}

                <!-- <input type="hidden" name="thread_id" value="{{ $thread->id }}"> -->

	            <textarea class="ckeditor" id="comment" name="comment"></textarea>

	            <div class="input-field">

            		<button id="btn_submit" type="submit" class="btn waves-effect waves-light red darken-2">post comment</button>

            	</div>

            	@include('errors.form_errors')

	        </form>

	    </li>

	</ul>

@stop