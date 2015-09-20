<?php

	$place_of_work = [

		'Local',
		'Abroad'

	];

	$selected = isset($employment_data) ? $employment_data->place_of_work : null ;

?>

<div class="input-field">

	<select name="place_of_work">

		@foreach ($place_of_work as $value)

			<option value="{{ $value }}" {{ $selected === $value ? 'selected' : null }}>{{ $value }}</option>

		@endforeach

	</select>

	<label>Place of Work</label>

</div>
