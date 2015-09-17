<!--

	@params

	Collection $educational_attainments, 
	$professional_exams_passed,
	$employment_data,
	$training_or_advance_studies

-->
@extends('master')
@section('content-fluid')

<div id="survey_list">

	<div class="row marg_20">

		<div class="input-field">

			<select id="department_filter">

		        <option value="0">All Departments</option>

		        <option value="1">Public Department</option>

		        <option value="2">CICS Department</option>

		        <option value="3">CABA Department</option>

		        <option value="4">CTE Department</option>

		        <option value="5">High School Department</option>

		        <option value="6">UPHS Department</option>

		    </select>

		    <label>Sort by department:</label>
	        
	    </div>

	</div>

	<div id="content">

		

			@include('survey.includes.survey_list')

		

	</div>

</div>

@stop