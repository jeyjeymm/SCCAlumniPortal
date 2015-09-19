@include('includes.css')

  <div id="professional_exams_passed">

    <div class="container">

        <h4>San Carlos College Survey</h4>     
        <h5>Educational Background</h5>

        <div class="card pad_20" id="pep_fields">

            <div class="row">

                <h5 class="marg_20">Professional Examination(s) Passed</h5>

            </div>

            <form id="form_professionalExamsPassed" action="{{ url('survey/professional_exams_passed/1') }}" method="post">

                {!! csrf_field() !!}

                <div id="professional_exams_passed_fields">

                  <div class="professional_exams_passed_row">
                
                      <div class="col s12 m6 l6">

                          <div class="input-field">

                              <input name="name_of_exam_1" type="text" required/>

                              <label>Name of Examination</label>

                          </div>

                      </div>

                      <div class="col s12 m3 l3">

                          <div class="input-field">

                              <input name="date_taken_1" type="date" required/>

                          </div>

                      </div>

                      <div class="col s12 m3 l3">

                          <div class="input-field">

                              <input name="rating_1" type="text" required/>

                              <label>Rating</label>

                          </div>

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

        <!-- Skip Button -->
        <a href="{{ url('survey/4') }}" class="btn-flat waves-effect waves-dark red-text right">

            <i class="material-icons right">arrow_forward</i>skip

        </a>

    </div>

  </div>

@include('includes.scripts')
@include('includes.selected_scripts',['scripts' => ['professional_exams']])