var employment_data = (function() {

    var employment_data = $('#employment_data');

    var yes_container = employment_data.find('#yes_container');
    var no_container = employment_data.find('#no_container');

    var btn_yes = employment_data.find('#btn_yes');
    var btn_no = employment_data.find('#btn_no');


    /*var btn_yes_first_job = $('#btn_yes_first_job');
    var btn_no_first_job = $('#btn_no_first_job');
    var first_job_yes_container = $('#first_job_yes_container');
    var first_job_no_container = $('#first_job_no_container');*/


    btn_yes.on('change',showEmployedForm);
    btn_no.on('change',showUnemployedForm);






    function showEmployedForm() {

        if(this.checked) {

            no_container.is(':visible') ? no_container.hide() : null ;
            yes_container.show();

        }else{

            yes_container.hide();

        }
    }






    function showUnemployedForm() {

        if(this.checked) {

            yes_container.is(':visible') ? yes_container.hide() : null ;
            no_container.show();

        }else{

            no_container.hide();

        }
    }


    /*
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

    });*/

})();