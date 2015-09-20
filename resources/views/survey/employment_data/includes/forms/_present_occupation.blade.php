<?php 
	
	$present_occupation = isset($employment_data) ? $employment_data->present_occupation : old('present_occupation');
	$name_of_company_or_org = isset($employment_data) ? $employment_data->name_of_company_or_org : old('name_of_company_or_org');
	$work_address = isset($employment_data) ? $employment_data->work_address : old('work_address') ;

?>

<div class="input-field">

    <h5><b> Present Occupation </b></h5>

</div>

@include('survey.employment_data.includes.forms._industry')

<div class="input-field">

    <input type="text" name="present_occupation" value="{{ $present_occupation }}" required/>
    <label>Occupation</label>
    
</div>

<div class="input-field">

    <input type="text" name="name_of_company_or_org" value="{{ $name_of_company_or_org }}" required/>
    <label>Name of Company or Organization</label>

</div>

@include('survey.employment_data.includes.forms._place_of_work')

<div class="input-field">

    <input type="text" name="work_address" value="{{ $work_address }}" required/>
    <label>Work Address:</label>

</div>
