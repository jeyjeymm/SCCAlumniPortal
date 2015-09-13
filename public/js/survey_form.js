//Educational Attainment
var btn_educational_attainment_add = $('#btn_educational_attainment_add');
var btn_educational_attainment_remove = $('#btn_educational_attainment_remove');
var educational_attainment_fields = $('#educational_attainment_fields')

var btn_professional_exams_passed_add = $('#btn_professional_exams_passed_add');
var btn_professional_exams_passed_remove = $('#btn_professional_exams_passed_remove');
var professional_exams_passed_fields = $('#professional_exams_passed_fields');


var btn_training_or_advanced_studies_add = $('#btn_training_or_advanced_studies_add');
var btn_training_or_advanced_studies_remove = $('#btn_training_or_advanced_studies_remove');
var training_or_advanced_studies_fields = $('#training_or_advanced_studies_fields');


var form_educational_attainments = $('#form_educational_attainments');
var form_professional_exams_passed = $('#form_professional_exams_passed');
var form_training_or_advanced_studies = $('#form_training_or_advanced_studies');


//Employment Data
var employment_data_yes_container = $('#employment_data_yes_container');
var employment_data_no_container = $('#employment_data_no_container');


var btn_yes_first_job = $('#btn_yes_first_job');
var btn_no_first_job = $('#btn_no_first_job');
var first_job_yes_container = $('#first_job_yes_container');
var first_job_no_container = $('#first_job_no_container');



//Educational Attainment
btn_educational_attainment_add.on('click',function(e){

    e.preventDefault();

    var temp = form_educational_attainments.prop('action').substr(-1,1);

    var i = parseInt(temp) + 1;

        var html = 
            
            '<div class="educational_attainment_row">'+

                    '<hr class="red" style="padding: 1px" />'+

                    '<div class="input-field">'+

                        '<input name="degree_' + i + '" type="text" required/>'+

                        '<label class="truncate">Degree(s) & Specialization</label>'+

                    '</div>'+

                    '<div class="input-field">'+

                        '<input name="college_or_university_' + i + '" type="text" required/>'+

                        '<label class="truncate">College or University</label>'+

                    '</div>'+

                    '<div class="input-field">'+

                        '<input name="year_graduated_' + i + '" type="text" required/>'+

                        '<label class="truncate">Year Graduated</label>'+

                    '</div>'+

                    '<div class="input-field">'+

                        '<input name="honors_or_awards_' + i + '" type="text" required/>'+

                        '<label class="truncate">Honors or Awards Received</label>'+

                    '</div>'+

            '</div>';

        
        form_educational_attainments.prop('action',window.location.origin + '/survey/educational_attainment/' + i )   

        educational_attainment_fields.append(html);
});



btn_educational_attainment_remove.on('click', function(e){

    e.preventDefault();

    educational_attainment_fields.children('.educational_attainment_row').last().remove();

    var temp = form_educational_attainments.prop('action').substr(-1,1)

    var i = temp - 1;

    form_educational_attainments.prop('action',window.location.origin + '/survey/educational_attainments/' + i ) 

});



btn_professional_exams_passed_add.on('click',function(e){

    e.preventDefault();

    var temp = form_professional_exams_passed.prop('action').substr(-1,1);

    var i = parseInt(temp) + 1;

    var html = 
        '<div class="professional_exams_passed_row">'+

            '<hr class="red" style="padding: 1px" />'+

            '<div class="col s12 m6 l6">'+

                    '<div class="input-field">'+

                        '<input name="name_of_exam_' + i + '" type="text" required/>'+

                        '<label>Name of Examination</label>'+

                   '</div>'+

                '</div>'+

                '<div class="col s12 m3 l3">'+

                    '<div class="input-field">'+

                        '<input name="date_taken_' + i + '" type="date" required/>'+

                    '</div>'+

                '</div>'+

                '<div class="col s12 m3 l3">'+

                    '<div class="input-field">'+

                        '<input name="rating_' + i + '" type="text" required/>'+

                        '<label>Rating</label>'+

                    '</div>'+

                '</div>'+

            '</div>';

    professional_exams_passed_fields.append(html);

    form_professional_exams_passed.prop('action',window.location.origin + '/survey/professional_exams_passed/' + i )

});


btn_professional_exams_passed_remove.on('click', function(e){

    e.preventDefault();

    professional_exams_passed_fields.children('.professional_exams_passed_row').last().remove();

});


btn_training_or_advanced_studies_add.on('click',function(e){

    e.preventDefault();

    var temp = form_training_or_advanced_studies.prop('action').substr(-1,1);

    var i = parseInt(temp) + 1;

    var html = 
            '<div class="training_or_advanced_studies_row">'+

                '<hr class="red" style="padding: 1px" />'+

                    '<div class="col s12 m4 l4">'+

                        '<div class="input-field">'+

                            '<input name="training_or_advanced_study_' + i + '" type="text" required/>'+

                            '<label>Title of Training or Advance Study</label>'+

                        '</div>'+

                    '</div>'+

                    '<div class="col s12 m4 l4">'+

                        '<div class="input-field">'+

                            '<input name="duration_' + i + '" type="text" required/>'+

                            '<label>Duration</label>'+

                        '</div>'+

                    '</div>'+

                    '<div class="col s12 m4 l4">'+

                        '<div class="input-field">'+

                            '<input name="institution_' + i + '" type="text" required/>'+

                            '<label>Name of Institution</label>'+

                        '</div>'+

                    '</div>'+

                '</div>'+

            '</div>';


    form_training_or_advanced_studies.prop('action',window.location.origin + '/survey/training_or_advanced_studies/' + i )   

    training_or_advanced_studies_fields.append(html);
   
});

btn_training_or_advanced_studies_remove.on('click', function(e){

    e.preventDefault();

    training_or_advanced_studies_fields.children('.training_or_advanced_studies_row').last().remove();

    var temp = form_training_or_advanced_studies.prop('action').substr(-1,1)

    var i = temp - 1;

    form_training_or_advanced_studies.prop('action',window.location.origin + '/survey/training_or_advanced_studies/' + i ) 

});


$('#btn_yes_employment_data').on('change',function() {

    if(this.checked) {

        employment_data_no_container.is(':visible') ? employment_data_no_container.hide() : '' ;
        employment_data_yes_container.show();

    }else{

        employment_data_yes_container.hide();

    }
});



$('#btn_no_employment_data').on('change',function() {

    if(this.checked) {

        employment_data_yes_container.is(':visible') ? employment_data_yes_container.hide() : '' ;
        employment_data_no_container.show();

    }else{

       employment_data_no_container.hide();

    }
});



$('#btn_never_employment_data').on('change',function() {

    if(this.checked) {

        employment_data_yes_container.is(':visible') ? employment_data_yes_container.hide() : '' ;
        employment_data_no_container.show();

    }else{

       employment_data_no_container.hide();

    }

});


btn_yes_first_job.on('change',function() {

    first_job_no_container.is(':visible') ? first_job_no_container.hide() : '' ;    
    first_job_yes_container.show();

});


btn_no_first_job.on('change',function() {

    first_job_yes_container.is(':visible') ? first_job_yes_container.hide() : '' ;    
    first_job_no_container.show();

});