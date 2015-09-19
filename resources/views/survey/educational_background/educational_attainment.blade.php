@include('includes.css')

    <div id="educational_attainments">

        <div class="container">

            <h4>San Carlos College Survey</h4>     
            <h5>Educational Background</h5>


            <div class="card pad_20">    

                <div class="row">

                    <h5 class="marg_20">Educational Attainment</h5>

                </div>
                
                <form id="form_educationalAttainments" action="{{ url('survey/educational_attainments/1') }}" method="post">

                    {!! csrf_field() !!}
        
                    <div id="educational_attainment_fields">

                        <div class="educational_attainment_row">

                                <div class="input-field">

                                    <input name="degree_1" type="text" required/>

                                    <label class="truncate" for="1">Degree(s) and/or Specialization</label>

                                </div>

                                <div class="input-field">

                                    <input id="2" name="college_or_university_1" type="text" required/>

                                    <label class="truncate" for="2">College or University</label>

                                </div>

                                <div class="input-field">

                                    <input id="3" name="year_graduated_1" type="text" required/>

                                    <label class="truncate" for="3">Year Graduated</label>

                                </div>

                                <div class="input-field">

                                    <input id="4" name="honors_or_awards_1" type="text"/>

                                    <label class="truncate" for="4">Honors or Awards Received</label>

                                </div>

                        </div>

                    </div>

                    <!-- Add additional fields -->
                    <a id="btn_add" class="btn-flat waves-effect waves-blue">

                        <i class="material-icons left">add</i>Add Field

                    </a>

                    <!-- Remove fields -->
                    <a id="btn_remove" class="btn-flat waves-effect waves-dark red-text">

                        <i class="material-icons left">remove</i>Remove Field

                    </a>

                    <!-- Submit form -->
                    <button type="submit" class="btn red darken-4 waves-effect waves-light right">
                
                        <i class="material-icons right">arrow_forward</i>
                       
                        Next
                   
                    </button>

                </form>

            </div>   

        </div>

    </div>

@include('includes.scripts')
@include('includes.selected_scripts',['scripts' => ['educational_attainments']])
