<div id="occupation_container">

	<div class="input-field">

	    <h5> Present Occupation </h5>

	</div>

	<div class="input-field">

	    <input type="text" name="present_occupation" required/>
	    <label>Present Occupation</label>
	    
	</div>

	<div class="input-field">

	    <input type="text" name="name_of_company_or_org" required/>
	    <label>Name of Company or Organization</label>

	</div>

	<div class="input-field">

	    @include('survey.employment_data.includes.place_of_work')
	    <label>Place of Work</label>

	</div>

	<div class="input-field">

	    <input type="text" name="work_address" required/>
	    <label>Work Address:</label>

	</div>

</div>