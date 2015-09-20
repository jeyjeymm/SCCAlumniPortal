<?php

	$competencies_learned = [

		'Written and verbal communication',
		'Teamwork',
		'Commercial awareness',
		'Attention to detail',
		'Time management (Organization)',
		'Adaptability and flexibility',
		'Leadership',
		'Customer focus/Orientation',
		'Interpersonal effectiveness',
		'Planning and organizing'

	];

	$selected = isset($employment_data) ? $employment_data->employment_status : null ;

?>
                                  	
<div class="input-field">

	<h5><b> Competencies Learned: </b></h5>

	<select name="competencies_learned" class="browser-default">

		@foreach($competencies_learned as $value)
			
			<option value="{{ $value }}" {{ $selected === $value ? 'selected' : null }}>{{ $value }}</option>

		@endforeach

	</select>

</div>