<!--

	@params

	EmploymentData $employment_data

-->
<?php

	$employment_status = [

		'Regular or Permanent',
		'Temporary',
		'Casual',
		'Contractual',
		'Self-Employed'

	];


	$place_of_work = [

		'Local',
		'Abroad'

	];

	$salaries = [

		'Below P5,000.00',
		'P15,000.00 to less than P20,000.00',
		'P5,000.00 to less than P10,000.00',
		'P20,000.00 to less than P25,000.00',
		'P10,000.00 to less than P15,000.00',
		'P25,000.00 and above'

	];


?>


<div id="employment_status_container">
              	
	<h5>Present Employment Status: </h5>

	<div class="input-field">

		<select name="employment_status">

			@foreach($employment_status as $value)
				
				<option value="{{ $value }}" {{ $employment_data->employment_status === $value ? 'selected' : '' }}>{{ $value }}</option>

			@endforeach

		</select>

	<label>Employment Status</label>

	</div>                    	

</div>

<div id="occupation_container">

    <div class="input-field">

        <h5> Present Occupation </h5>

    </div>

    <div class="input-field">
    
        <input type="text" name="present_occupation" value="{{ $employment_data->present_occupation }}" required/>
        <label>Present Occupation</label>

    </div>

    <div class="input-field">
    
        <input type="text" name="name_of_company_or_org" value="{{ $employment_data->name_of_company_or_org }}" required/>
        <label>Name of Company or Organization</label>

    </div>

    <div class="input-field">
    
        <select name="place_of_work">
			@foreach ($place_of_work as $value)

				<option value="{{ $value }}" {{ $employment_data->place_of_work === $value ? 'selected' : '' }}>{{ $value }}</option>

			@endforeach
		</select>

        <label>Place of Work</label>

    </div>

    <div class="input-field">

        <input type="text" name="work_address" value="{{ $employment_data->work_address }}" required/>
        <label>Work Address:</label>

    </div>

</div>

<div id="salaries">

	<div class="input-field">

		<h5>What is your initial gross monthly earning in your first job after college?</h5>
		
		<select name="salary" class="browser-default">
		@foreach ($salaries as $value)

			<option value="{{ $value }}" {{ $employment_data->salary === $value ? 'selected' : '' }}>{{ $value }}</option>

		@endforeach
		</select>

	</div>

</div>

<div id="curriculum_relevance">

	<div class="input-field">
		
	<h5>Was the curriculum you had in college relevant to your first job?</h5>

	<select name="is_curriculum_relevant">

		<option value="Yes" {{ $employment_data->is_curriculum_relevant === 'Yes' ? 'selected' : '' }} >Yes</option>
		<option value="No" {{ $employment_data->is_curriculum_relevant === 'No' ? 'selected' : '' }} >No</option>

	</select>

</div>
  
</div>


