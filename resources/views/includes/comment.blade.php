<!--

    @params
	Thread $thread / Article $article
    Comment $comment

-->

<?php

	if ($comment->user->profile !== null) {

		$url = 'profiles' . '.' . $comment->user->profile->id . '.' . 'profile_picture';
		$name = $comment->user->profile->image_name !== '' ? $comment->user->profile->image_name : 'default' ;
		$profile_id = $comment->user->profile->id;

	} else {

		$url = 'profiles';
		$name = 'default';
	}


	if(isset($thread)){

		$model = $thread;
		$page = 'threads';

	}else{

		$model = $article;
		$page = 'articles';

	}

?>

<div id="comments">

	<li class="collection-item avatar grey lighten-4">

		<img src="{{ route('getPhoto',['url' => $url, 'name' => $name]) }}" alt="Avatar" class="circle">

	  	<p>

	  		<i>

	  			<a href="{{ isset($profile_id) ? url('profiles/'.$profile_id) : '#' }}">

	  				{{ $comment->user->name }}
	  			
	  			</a> 

	  			commented {{ $comment->created_at->diffForHumans() }}: 

	  			@if ($comment->created_at != $comment->updated_at)

	  				(updated {{ $comment->updated_at->diffForHumans() }})

	  			@endif

	  		</i>

	  		<div style="padding: 7px 30px"> {!! $comment->comment !!} </div>

	  	</p>

	  	@if (Auth::check())

		  	@if ($comment->user->id === Auth::user()->id || Auth::user()->role->name === 'admin')

		  		<div class="open_comment_modal">

		  			<a id="{{ $page }}_{{ $model->id }}_{{ $comment->id }}" href="#!" class="secondary-content"><i class="material-icons">edit</i></a>

		  		</div>

		  	@endif

		@endif

	</li>

</div>