<!--

	@params

	Collection $threads

-->

<ul class="collection with-header transparent">

	<li class="collection-header red darken-2">
		
	<h4 class="white-text"> user threads: </h4>

	</li>

	@if ($threads->all())

		@foreach ($threads as $thread)

			<a href="{{ url('threads/'.$thread->id) }}" class="collection-item avatar"> 

				<img src="{{ route('getPhoto',['url' => 'profiles' . '.' . $thread->user->profile->id . '.' . 'profile_picture', 'name' => $thread->user->profile->image_name]) }}" alt="Avatar" class="circle"/>

				<p>

					{{ $thread->title }} 

					<br/>

					{{ $thread->updated_at->diffForHumans() }}

				</p>

			</a>

		@endforeach

	@else

		<li class="collection-item">No threads to show.</li>

	@endif

</ul>