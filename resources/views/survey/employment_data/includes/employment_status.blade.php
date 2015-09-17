<?php

	$employment_status = [

		'Regular or Permanent',
		'Temporary',
		'Casual',
		'Contractual',
		'Self-Employed'

	];



?>
<div id="employment_status_container">
                                  	
	<h5>Present Employment Status: </h5>

	<div class="input-field">

		<select name="employment_status">

			@foreach($employment_status as $value)
				
				<option value="{{ $value }}">{{ $value }}</option>

			@endforeach

		</select>
		
		<label>Employment Status</label>

	</div>                    	

</div>