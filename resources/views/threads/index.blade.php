<!--

	@Params

	Collection $threads

-->

@extends('master')

@section('fab')
                    
    @include('threads.includes.threads_fab')

@stop

@section('content')

<ul class="collection with-header">

	<li class="collection-header red darken-1">

		<h4 class="white-text">Threads</h4>

	</li>

	@if ($threads->all())

		@include('threads.includes.thread_modal')

		<div id="threads_collection">

			@foreach ($threads as $thread)

		    	@include('threads.includes.thread')

		    @endforeach

	    </div>

	    <div class="input-field">
	    	@include('includes.pagination',['paginator' => $threads])
	    </div>

	@else

		<li class="collection-item center red white-text">Be the first to post a thread!</li>

    @endif

    <li id="thread_container" class="collection-item" style="display:none">

    	<h5 class="center">Post a thread...</h5>

	    <form id="form_thread" action=" {{ url ('threads') }} " method="post">

	    	<input class="laravel_method" type="hidden">

	    	{!! csrf_field() !!}

	    	<div class="input-field">

	    		<input type="text" id="txt_thread_title" name="title" value="{{ old('title') }}"/>
	    		<label id="lbl_thread_title" for="title">Thread title:</label>

	    	</div>

	    	<div class="input-field">

           		<textarea class="ckeditor" id="body" name="body" type="text" value="{{ old('body') }}"></textarea>

            </div>

            <div class="input-field">

            	<button id="btn_submit" type="submit" class="btn waves-effect waves-light red darken-2">post thread</button>

            </div>

            @include('errors.form_errors')

	    </form>
    </li>

</ul>

@stop