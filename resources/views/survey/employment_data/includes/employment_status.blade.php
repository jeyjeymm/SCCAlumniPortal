<?php

	$employment_status = [

		'Regular or Permanent',
		'Temporary',
		'Casual',
		'Contractual',
		'Self-Employed'

	];

	$selected = isset($employment_data) ? $employment_data->employment_status : null ;

?>
                                  	
<h5><b> Present Employment Status: </b></h5>

<div class="input-field">

	<select name="employment_status">

		@foreach($employment_status as $value)
			
			<option value="{{ $value }}" {{ $selected === $value ? 'selected' : null }}>{{ $value }}</option>

		@endforeach

	</select>
	
	<label>Employment Status</label>

</div>