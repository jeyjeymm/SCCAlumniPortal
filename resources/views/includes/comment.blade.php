<!--

    @params
	Thread $thread / Article $article
    Comment $comment

-->

<?php

	if ($comment->user->profile !== null) {

		$url = 'profiles' . '.' . $comment->user->profile->id . '.' . 'profile_picture';
		$name = $comment->user->profile->image_name;
		$profile_id = $comment->user->profile->id;

	} else {

		$url = 'profiles';
		$name = 'default.jpg';
	}


	if(isset($thread)){

		$model = $thread;
		$page = 'threads';

	}else{

		$model = $article;
		$page = 'articles';

	}

?>

<li class="collection-item avatar grey lighten-4">

	<img src="{{ route('getPhoto',['url' => $url, 'name' => $name]) }}" alt="Avatar" class="circle">

  	<p>

  		<i>

  			<a href="{{ isset($profile_id) ? url('profiles/'.$profile_id) : '#' }}">

  				{{ $comment->user->name }}
  			
  			</a> 

  			commented {{ $comment->updated_at->diffForHumans() }}:

  		</i>

  		<div style="padding: 7px 30px"> {!! $comment->comment !!} </div>

  	</p>

  	@if (Auth::check())

	  	@if ($comment->user->id === Auth::user()->id || Auth::user()->role->id === 1)

	  		<div class="open_comment_modal">

	  			<a id="{{ $page }}_{{ $model->id }}_{{ $comment->id }}" href="#" class="secondary-content"><i class="material-icons">edit</i></a>

	  		</div>

	  	@endif

	@endif

</li>