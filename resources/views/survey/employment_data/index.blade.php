@include('includes.css')
<div class="container">
<!--Employment Data-->

        <h4>San Carlos College Survey</h4>
        <h5>Employment Data</h5>

        <div class="card pad_20" id="ed_fields">  

            <p class="grey-text">**Employment here means any type of work performed or services rendered in exchanged for compensation under a contact of hire which create the employer and employee relations.</p>

<!--row1--> <hr />
		      
            <h5>Are you presently employed?</h5>

            <div class="row">

                <div class="col s12 m4 l4">
                       
                        <input name="employment_data_yes_no_options" type="radio" id="btn_yes_employment_data">
                        
                        <label for="btn_yes_employment_data">Yes</label>
                
                </div>
                
                <div class="col s12 m4 l4">
                                    
                        <input name="employment_data_yes_no_options"  type="radio" id="btn_no_employment_data">
                     
                        <label for="btn_no_employment_data">No</label>
                               
                </div>
                
                <div class="col s12 m4 l4">
                  
                        <input name="employment_data_yes_no_options"  type="radio" id="btn_never_employment_data">
                   
                        <label for="btn_never_employment_data">Never</label>
               
                </div>

            </div>

<!--/row1-->

<!--YES_OPTIONS-->
           
            <div class="card pad_20" id="employment_data_yes_container" style="display:none">

                <form action="{{ url('survey/employment_data/yes') }}" method="post">

                    {!! csrf_field() !!}

                    <div id="employment_status_container">
                                  	
                    	<h5>Present Employment Status: </h5>

                    	<div class="input-field">

                        	@include('survey.employment_data.includes.employment_status')
                        	<label>Employment Status</label>

                    	</div>                    	

                    </div>

                    <div id="occupation_container">

                        <div class="input-field">

                            <h5> Present Occupation </h5>

                        </div>

                        <div class="input-field">
                        
                            @include('survey.employment_data.includes.major_line_of_company')
                            
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

                    @include('survey.employment_data.includes.job')

                    <!--Submit Button-->

                    <button type="submit" class="btn red darken-4 waves-effect waves-light right">
                        
                        <i class="material-icons right">done</i>
                       
                        Finish
                   
                    </button>
                
                </form>

            </div>


<!--/YES_OPTIONS-->


<!--NO_NEVER_OPTIONS-->
            
            <div class="card pad_20" id="employment_data_no_container" style="display:none;">
                
                <p>Please state reason(s) why you are not yet employed.  You may check more than one answer.</p>

                    <form action="{{ url('survey/employment_data/no') }}" method="post">

                        {!! csrf_field() !!}

                        @include('survey.employment_data.includes.reasons_not_yet_employed')
                        
                        <div class="input-field">
                           
                            <input type="text" name="reasons_not_yet_employed_others">
                           
                            <label for="reasons_not_yet_employed_others">Others, please specify</label>
                        
                        </div>

                        <!--Submit Button-->

                        <button type="submit" class="btn red darken-4 waves-effect waves-light right">
                            
                            <i class="material-icons right">done</i>
                           
                            Finish
                       
                        </button>

                    </form>
           
            </div>




<!--/NO_NEVER_OPTIONS-->

        </div>

<!--/Employment Data-->
</div>

@include('includes.scripts')




