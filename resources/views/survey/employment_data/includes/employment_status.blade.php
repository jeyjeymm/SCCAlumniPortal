<?php

	$employment_status = [

		'Regular or Permanent',
		'Temporary',
		'Casual',
		'Contractual',
		'Self-Employed'

	];



?>
<select name="employment_status">
@foreach($employment_status as $value)
	
	<option value="{{ $value }}">{{ $value }}</option>

@endforeach
</select>