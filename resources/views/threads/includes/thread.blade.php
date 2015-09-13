<!--

	@Params

	Thread $thread

-->

<?php

	if ($thread->user->profile !== null) {

		$url = 'profiles' . '.' . $thread->user->profile->id . '.' . 'profile_picture';
		$name = $thread->user->profile->image_name;



	} else {


		$url = 'profiles';
		$name = 'default.jpg';
	}


	if (Auth::check()) {

		if (Auth::user()->role->id === 1) {

			$thread_ownership_validation = true;

		} else {

			$thread_ownership_validation = $thread->user->id === Auth::user()->id ? true : false;

		}

	} else {

		$thread_ownership_validation = false;

	}

?>

<a id="thread_{{ $thread->id }}" href=" {{ url('threads/' . $thread->id) }} " class="collection-item avatar">

	<!-- Used for validation in javascript -->
	<input type="hidden" id="thread_ownership_validation" value="{{ $thread_ownership_validation }}">

  	<img src="{{ route('getPhoto',['url' => $url, 'name' => $name]) }}" alt="Avatar" class="circle">

  	<span id="thread_title" class="title"><b>{{ $thread->title }}</b></span>

  	<p class="black-text">

  		{{ $thread->user->name}}

  			<br />

    	{{ $thread->updated_at->diffForHumans() }}

  	</p>

</a>