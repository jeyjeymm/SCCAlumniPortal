var survey_list = (function(){

	var survey_list = $('#survey_list');
	var department_filter = survey_list.find('#department_filter');
	var content = survey_list.find('#content');
	


	department_filter.on('change', filterByDepartment);



	function filterByDepartment(){

		var department = $(this).val();

		console.log(department);

		surveyQuery(department);

	}

	function surveyQuery(department){


		var get = $.get('/survey/list/filter/'+ department);

			get.done(function(view){

				content.html(view);
				
			});

	}

})();