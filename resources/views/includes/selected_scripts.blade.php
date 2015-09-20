@if(count($scripts) !== 0)

	@foreach($scripts as $name)

	<script type="text/javascript" src="{{ asset('js/'.$name.'.js') }}"></script>

	@endforeach

@endif