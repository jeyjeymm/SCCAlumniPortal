<!-- Job Finding Duration -->
	<?php 

		$job_finding_duration = [

			'Less than a month',
			'1 year to less than 2 years',
			'1 to 6 months',
			'2 years to less than 3 years',
			'7 to 11 months',
			'3 years to less than 4 years'

		];

	?>

	<div class="input-field">

		<h5><b> How long did it take you to land your job? </b></h5>

		<select name="job_finding_duration" class="browser-default">

			@foreach ($job_finding_duration as $value)

				<option value="{{ $value }}">{{ $value }}</option>

			@endforeach

		</select>

	</div>