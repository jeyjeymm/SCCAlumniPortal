@include('includes.css')

    <div id="employment_data">

        <div class="container">

            <h4>San Carlos College Survey</h4>
            <h5>Employment Data</h5>

            <div class="card pad_20" id="ed_fields">

                <h5>Work Information</h5>

                <p class="grey-text">**Employment here means any type of work performed or services rendered in exchanged for compensation under a contact of hire which create the employer and employee relations.</p>

                <hr />
    		      
                <h5>Are you presently employed?</h5>

                <div class="row">

                    <div class="input-field col s12 m6 l6">
                           
                        <input name="yes_no_options" type="radio" id="btn_yes">
                        
                        <label for="btn_yes">Yes</label>
                    
                    </div>
                    
                    <div class="input-field col s12 m6 l6">
                                        
                        <input name="yes_no_options"  type="radio" id="btn_no">
                     
                        <label for="btn_no">No</label>
                                   
                    </div>
                    
                    <!--<div class="col s12 m4 l4">
                      
                        <input name="employment_data_yes_no_options"  type="radio" id="btn_never_employment_data">
                   
                        <label for="btn_never_employment_data">Never</label>
                   
                    </div>-->

                </div>


    <!--YES_OPTIONS-->
               
                <div class="pad_20" id="yes_container" style="display:none">

                    <form action="{{ url('survey/employment_data/yes') }}" method="post">

                        {!! csrf_field() !!}


                        @include('survey.employment_data.includes.forms.employment_data')
          

                        <!--Submit Button-->

                        <button type="submit" class="btn red darken-4 waves-effect waves-light right marg_20">
                            
                            <i class="material-icons right">done</i>
                           
                            Finish
                       
                        </button>
                    
                    </form>

                </div>


    <!--/YES_OPTIONS-->


    <!--NO_OPTIONS-->
                
                <div class="pad_20" id="no_container" style="display:none;">
                    
                    <p>Please state reason(s) why you are not yet employed.  You may check more than one answer.</p>

                        <form action="{{ url('survey/employment_data/no') }}" method="post">

                            {!! csrf_field() !!}

                            @include('survey.employment_data.includes.forms._reasons_not_yet_employed')

                            <!--Submit Button-->

                            <button type="submit" class="btn red darken-4 waves-effect waves-light right marg_20">
                                
                                <i class="material-icons right">done</i>
                               
                                Finish
                           
                            </button>

                        </form>
               
                </div>

    <!--/NO_OPTIONS-->

            </div>

        </div>

    </div>

@include('includes.scripts')
@include('includes.selected_scripts',['scripts' => ['employment_data']])





