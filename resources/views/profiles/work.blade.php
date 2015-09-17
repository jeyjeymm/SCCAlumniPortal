<!--

	@param

	EmploymentData $employment_data

-->


<div class="card pad_20">

	<h5>employment info:

		@if (Auth::user()->role->name === 'user')

			<a href="{{ url('employment_data/' . Auth::user()->employment_data->id . '/edit') }}"><i class="material-icons right">edit</i></a>

		@endif
	
	</h5>

	<hr />

	@if ($employment_data->first())

		@if ($employment_data->employment_status !== '')

			<p class="col s6 m6 l6"><b>Employment Status:</b></p>

		    <p class="col s6 m6 l6" name="employment_status"> {{ $employment_data->employment_status }} </p>    



			<p class="col s6 m6 l6"><b>Present Occupation:</b></p>

		    <p class="col s6 m6 l6" name="present_occupation"> {{ $employment_data->present_occupation }} </p>    



			<p class="col s6 m6 l6"><b>Name of Company or Organization:</b></p>

		    <p class="col s6 m6 l6" name="name_of_company_or_org"> {{ $employment_data->name_of_company_or_org }} </p>   



		    <p class="col s6 m6 l6"><b>Place of Work:</b></p>

		    <p class="col s6 m6 l6" name="place_of_work"> {{ $employment_data->place_of_work }} </p>     



			<p class="col s6 m6 l6"><b>Job Duration:</b></p>

		    <p class="col s6 m6 l6" name="job_duration"> {{ $employment_data->job_duration }} </p>    



			<p class="col s6 m6 l6"><b>Salary:</b></p>

		    <p class="col s6 m6 l6" name="salary"> {{ $employment_data->salary }} </p>    

	    @else

	    	<p class="col s6 m6 l6"><b>Reasons not yet employed:</b></p>

		    <p class="col s6 m6 l6" name="reasons_not_yet_employed"> {{ $employment_data->reasons_not_yet_employed }} </p>  

	    @endif

    @else

    	<p> Currently no work information to display. </p>

	@endif

</div>
