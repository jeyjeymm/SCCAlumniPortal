<!--

	@params

	EmploymentData $employment_data

-->
<div id="first_job_container_yes_no">
                        
    <h5>Is this your first job after college?</h5>

    <div class="row">

        <div class="col s12 m6 l6">
               
                <input name="is_first_job" type="radio" id="btn_yes_first_job"  value="yes" {{ $employment_data->is_first_job === 'yes' ? 'checked' : '' }}>
                
                <label for="btn_yes_first_job">Yes</label>
        
        </div>
        
        <div class="col s12 m6 l6">
                            
                <input name="is_first_job"  type="radio" id="btn_no_first_job" value="no" {{ $employment_data->is_first_job === 'no' ? 'checked' : '' }}>
             
                <label for="btn_no_first_job">No</label>
                       
        </div>

    </div>

</div>

<!-- NO OPTION -->
<div id="first_job_no_container" style="display:none">

<!-- Reason for changing job -->
	<?php

		$reasons_for_changing_job = [

			1 => 'Salaries and benefits',
			2 => 'Career challenge',
			3 => 'Related to special skills',
			4 => 'Proximity to residence'


		];

	?>

	<div class="input-field">

		<h5>What were your reason (s) for changing job?</h5> 
		<p class="grey-text">You may check more than one answer</p>

		@foreach ($reasons_for_changing_job as $key => $value)

			<div class="input-field">

				<input name="reasons_for_changing_job[]" id="reasons_for_changing_job_{{ $key }}" type="checkbox" value="{{ $value }}" />
				<label for="reasons_for_changing_job_{{ $key }}"> {{ $value }}</label>

			</div>


		@endforeach
		<div class="input-field">
		  	<input name="reasons_for_changing_job_others" type='text'/>
		  	<label> Others, please specify</label>
	  	</div>

	 </div>




<!-- Job Duration -->
  	<?php 

  		$job_duration = [

  			'Less than a month',
  			'1 year to less than 2 years',
			'1 to 6 months',
			'2 years to less than 3 years',
			'7 to 11 months',
			'3 years to less than 4 years'

  		]; 

  	?>

  	<div class="input-field">

	  	<h5>How long did you stay in your first job?</h5>

	  	<select name="job_duration" class="browser-default">
	  	@foreach ($job_duration as $value)

	  		<option value="{{ $value }}" {{ $employment_data->job_duration === $value ? 'selected' : '' }} > {{ $value }} </option>

	  	@endforeach
	  	</select>

  	</div>

</div>

<div id="first_job_continuation_container">


<!-- Method of Finding Job -->
	<?php
	
		$method_of_finding_job = [

			'Response to an advertisement',
			'As walk-in applicant',
			'Recommended by someone',
			'Information from friends',
			'Arranged by school’s job placement officer',
			'Family business',
			'Job Fair or Public Employment Service Office (PESO)'

		];
	
	?>	

	<div class="input-field">

		<h5>How did you find your first job?</h5>

		<select name="method_of_finding_job" class="browser-default">
		@foreach ($method_of_finding_job as $value)

			<option value="{{ $value }}" {{ $employment_data->method_of_finding_job === $value ? 'selected' : '' }} >{{ $value }}</option>

		@endforeach
		</select>

		<div class="input-field">
			
			<input name="method_of_finding_job_others" type="text" />
			<label>Others, please specify</label>

		</div>

	</div>




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

		<h5>How long did it take you to land your first job?</h5>

		<select name="job_finding_duration" class="browser-default">
		@foreach ($job_finding_duration as $value)

			<option value="{{ $value }}" {{ $employment_data->job_finding_duration === $value ? 'selected' : '' }} >{{ $value }}</option>

		@endforeach
		</select>

		<div class="input-field">
			
			<input name="job_finding_duration_others" type="text"/>
			<label>Others, please specify</label>

		</div>

	</div>





<!-- Salary -->
	<?php
	
		$salaries = [

			'Below P5,000.00',
			'P15,000.00 to less than P20,000.00',
			'P5,000.00 to less than P10,000.00',
			'P20,000.00 to less than P25,000.00',
			'P10,000.00 to less than P15,000.00',
			'P25,000.00 and above'

		];
	
	?>

	<div class="input-field">

		<h5>What is your initial gross monthly earning in your first job after college?</h5>
		
		<select name="salary" class="browser-default">
		@foreach ($salaries as $value)

			<option value="{{ $value }}" {{ $employment_data->salary === $value ? 'selected' : '' }}>{{ $value }}</option>

		@endforeach
		</select>

	</div>





<!-- Curriculum Relevance -->
	<div class="input-field">
			
		<h5>Was the curriculum you had in college relevant to your first job?</h5>

		<select name="is_curriculum_relevant">

			<option value="Yes" {{ $employment_data->is_curriculum_relevant === 'yes' ? 'selected' : '' }} >Yes</option>
			<option value="No" {{ $employment_data->is_curriculum_relevant === 'no' ? 'selected' : '' }} >No</option>

		</select>

	</div>
      
</div>