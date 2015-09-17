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

	$line_of_work = [
		
		'Agriculture, Hunting and Forestry',
		'Fishing',
		'Mining and Quarrying',
		'Manufacturing',
		'Electricity, Gas and Water Supply',
		'Construction',
		'Wholesale and Retail Trade',
		'Repair of Motor Vehicles, Motorcycles and Personal and Household Goods',
		'Hotels and Restaurants',
		'Transport Storage and Communication',
		'Financial Intermediation',
		'Real State, Renting and Business Activities',
		'Public Administration and Defense',
		'Education',
		'Health and Social Work',
		'Other community, Social and Personal Service Activities',
		'Private Households with Employed Persons',
		'Extra-territorial Organizations and Bodies'

	];


	$place_of_work = [

		'Local',
		'Abroad'

	];


?>
@include('includes.css')
<div class="container">

	<div class="row">

		<div class="card pad_20" id="employment_data_yes_container">

		    <form action="{{ url('employment_data/'.$employment_data->id.'/update') }}" method="post">

		    	<input type="hidden" name="survey_id" value="">

		        {!! csrf_field() !!}

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
		            
		                <select name="present_occupation" class="browser-default" required>
							@foreach($line_of_work as $value)

								<option value="{{ $value }}"  {{ $employment_data->present_occupation === $value ? 'selected' : '' }}>{{ $value }}</option>

							@endforeach
						</select>

		                
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

		        @include('profiles.includes.forms.job')

		        <!--Submit Button-->

		        <button type="submit" class="btn red darken-4 waves-effect waves-light right">
		            
		            <i class="material-icons right">done</i>
		           
		            Finish
		       
		        </button>
		    
		    </form>

		</div>

	</div>

</div>
@include('includes.scripts')
