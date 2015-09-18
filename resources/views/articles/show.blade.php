<!--

	@Params

	Article $article;
	Collection $comments
	User $author;

-->

@extends('master')

@section('fab')

	@include('articles.includes.fab')

@stop

@section('content')

	<div class="col s12 m12 l12">

	        <div class="card">
	            
	            <div class="card-image">

	                <img class="responsive-img"
	                	src=" {{ route('getPhoto',['url' => 'articles' . '.' . $article->id, 'name' => $article->image_name]) }} " />

	              <span class="card-title red darken-4" style="opacity: .9">{{ $article->title }}</span>

	            </div>
	          
	            <div class="card-content">

	                <article class="marg_20">{!! $article->body !!}</article>

	                <br />

	                <p> Author: <i>{{ $author->name }}</i></p>

	                <p> <i>{{ $article->published_at->diffForHumans() }}</i></p>

	            </div>
	          
	            <div class="card-action">

	              <button id="btn_article_comment" class="btn red darken-2 white-text waves-effect waves-light {{ Auth::check() ? '' : 'hide' }} " href="/home/{{ $article->id }}/comments'">

	                  <i class="material-icons left">comment</i>

	                  Comment

	              </button>

	              <a class="btn-flat waves-effect" href=" {{ url('articles') }} ">Back</a>

	            </div>

	        </div>

	        <div id="article_comments_container" style="display: none">

	        	<ul class="collection with-header">   

				    <li class="collection-header">

				    	<h4>Comments:</h4> 

				    </li>

				    @if ($comments->all())

						@include('includes.comment_modal')

		            	@foreach ($comments as $comment)

					    	@include('includes.comment')

					    @endforeach

					@else

						<li class="collection-item"> No comments to show. </li>

				    @endif

				    <li class="form_commentContainer collection-item">

				    	<form id="form_comment" action=" {{ url ('articles/' . $article->id . '/comments') }} " method="post">

				    	<input type="hidden" class="laravel_method"/>

				    		{!! csrf_field() !!}

				            <div class="input-field">

				                <textarea class="ckeditor" id="comment" name="comment" required>

				                    {{ old('comment') }}	

				                </textarea>

				            </div>

				            <div class="input-field">

				            	<button id="btn_submit" type="submit" class="btn waves-effect waves-light red darken-2">post comment</button>

				       		</div>

				       		@include('errors.form_errors')

				       </form>

				    </li>

	            </ul>

	            @if ($comments->all())
				    
					@include('includes.pagination',["paginator" => $comments]);

				@endif

	        </div>
	        
	</div>

@stop

@section('page_scripts')

	@include('includes.selected_scripts',['scripts' => ['comments']])

@stop