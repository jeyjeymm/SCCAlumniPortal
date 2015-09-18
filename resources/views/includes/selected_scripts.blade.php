@if(count($scripts) !== 0)

	@foreach($scripts as $name)

	<script type="text/javascript" src="{{ url('js/'.$name.'.js') }}"></script>

	@endforeach

@endif