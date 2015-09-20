<!-- Method of Finding Job -->
<?php

	$job_finding_how = [

		'Response to an advertisement',
		'As walk-in applicant',
		'Recommended by someone',
		'Information from friends',
		'Arranged by school’s job placement officer',
		'Family business',
		'Job Fair',
		'Public Employment Service Office (PESO)'

	];

?>	

<div class="input-field">

	<h5><b> How did you find your job? </b></h5>

	<select name="job_finding_how" class="browser-default">

		@foreach ($job_finding_how as $value)

			<option value="{{ $value }}">{{ $value }}</option>

		@endforeach

	</select>

</div>