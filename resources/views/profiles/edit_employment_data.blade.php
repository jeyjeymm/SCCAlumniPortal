@include('includes.css')
<div class="container">

	<div class="row">

		<div class="card pad_20" id="employment_data_yes_container">

		    <form action="{{ url('employment_data/'.$employment_data->id.'/update') }}" method="post">

		    	<input type="hidden" name="survey_id" value="">

		        {!! csrf_field() !!}


		        @include('profiles.includes.forms.employment_data_form')


		        <!--Submit Button-->

		        <button type="submit" class="btn red darken-4 waves-effect waves-light right">
		            
		            <i class="material-icons right">done</i>
		           
		            Update
		       
		        </button>
		    
		    </form>

		</div>

	</div>

</div>
@include('includes.scripts')