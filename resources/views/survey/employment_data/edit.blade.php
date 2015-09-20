@include('includes.css')
<div class="container">

	<div class="row">

		<div class="card pad_20" id="employment_data_yes_container">

		    <form action="{{ url('employment_data/'.$employment_data->id.'/update') }}" method="post">

		    	<input type="hidden" name="survey_id" value="">

		        {!! csrf_field() !!}


		        @include('survey.employment_data.includes.forms.employment_data')


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
@include('includes.selected_scripts',['scripts' => ['employment_data']])