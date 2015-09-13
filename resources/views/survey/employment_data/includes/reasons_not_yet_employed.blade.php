<?php

	$reasons_not_yet_employed = [

		1 => "Advance or further study",
        2 => "Family concern and decided not to find a job",
        3 => "Health-related reason(s)",
        4 => "Lack of work experience",
        5 => "No job opportunity",
        6 => "Did not look for a job"

    ];

?>
@foreach ($reasons_not_yet_employed as $key => $value)
	<div class="input-field">

		<input id="reasons_not_yet_employed_cb_{{ $key }}" type="checkbox" name="reasons_not_yet_employed[]" value="{{ $value }}">

		<label for="reasons_not_yet_employed_cb_{{ $key }}">{{ $value }}</label>

	</div>
@endforeach