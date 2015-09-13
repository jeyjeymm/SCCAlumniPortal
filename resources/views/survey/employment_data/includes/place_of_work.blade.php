<?php

	$place_of_work = [

		'Local',
		'Abroad'

	];

?>
<select name="place_of_work">
@foreach ($place_of_work as $value)

	<option value="{{ $value }}">{{ $value }}</option>

@endforeach
</select>