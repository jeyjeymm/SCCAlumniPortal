@include('includes.css')
<div class="container">       

    <h4>San Carlos College Survey</h4>     
    <h5>Trainings or Advance Studies</h5>

    <div class="card pad_20" id="tas_fields"> 

        <h5>Trainings or Advance Studies Attended After College</h5>

        <p>Please list down all professional or work-related training program(s) including advance studies you have attended after college.</p>

        <form id="form_training_or_advanced_studies" action="{{ url('survey/training_or_advanced_studies/1') }}" method="post">

            {!! csrf_field() !!}

            <div id="training_or_advanced_studies_fields">

                <div class="training_or_advanced_studies_row">
            
                    <div class="col s12 m4 l4">

                        <div class="input-field">

                            <input name="training_or_advanced_study_1" type="text" required/>

                            <label>Title of Training or Advanced Study</label>

                        </div>

                    </div>

                    <div class="col s12 m4 l4">

                        <div class="input-field">

                            <input name="duration_1" type="text" required/>

                            <label>Duration</label>

                        </div>

                    </div>

                    <div class="col s12 m4 l4">

                        <div class="input-field">

                            <input name="institution_1" type="text" required/>

                            <label>Name of Institution</label>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Add additional fields -->
            <a id="btn_training_or_advanced_studies_add" class="btn-flat waves-effect waves-blue">

                <i class="material-icons left">add</i>Add Field

            </a>

            <!-- Remove fields -->
            <a id="btn_training_or_advanced_studies_remove" class="btn-flat waves-effect waves-dark red-text">

                 <i class="material-icons left">remove</i>Remove Field

            </a>


            <!-- Submit form -->
            <button type="submit" class="btn red darken-4 waves-effect waves-light right">
        
                <i class="material-icons right">arrow_forward</i>
               
                Next
           
            </button>

        </form>

    </div>

    <!-- Skip Button -->
    <a href="{{ url('survey/5') }}" class="btn-flat waves-effect waves-dark red-text right">

        <i class="material-icons right">arrow_forward</i>skip

    </a>

</div>

@include('includes.scripts')




