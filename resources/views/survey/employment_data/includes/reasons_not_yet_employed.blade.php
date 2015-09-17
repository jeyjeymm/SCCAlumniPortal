<?php

	$reasons_not_yet_employed = [

		1 => "Advance or further study",
		2 => "Never been employed",
        3 => "Family concern and decided not to find a job",
        4 => "Health-related reason(s)",
        5 => "Lack of work experience",
        6 => "No job opportunity",
        7 => "Did not look for a job",
        8 => "Recently resigned"

    ];

?>
@foreach ($reasons_not_yet_employed as $key => $value)

	<div class="input-field">

		<input id="reasons_not_yet_employed_cb_{{ $key }}" type="checkbox" name="reasons_not_yet_employed[]" value="{{ $value }}">

		<label for="reasons_not_yet_employed_cb_{{ $key }}">{{ $value }}</label>

	</div>

@endforeach

<div class="input-field">
                           
    <input type="text" name="reasons_not_yet_employed_others">
   
    <label for="reasons_not_yet_employed_others">Others, please specify</label>

</div>