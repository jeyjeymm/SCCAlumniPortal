var professional_exams_passed = (function() {

	var professional_exams_passed = $('#professional_exams_passed');
	var form_professionalExamsPassed = professional_exams_passed.find('#form_professionalExamsPassed');
	var professional_exams_passed_fields = form_professionalExamsPassed.find('#professional_exams_passed_fields');
	var btn_add = form_professionalExamsPassed.find('#btn_add');
	var btn_remove = form_professionalExamsPassed.find('#btn_remove');



	btn_add.on('click',addField);
	btn_remove.on('click', removeField);





	function addField(e){

	    typeof e != 'undefined' ? e.preventDefault() : null ;

	    _render('add');

	}





	function removeField(e){

	    typeof e != 'undefined' ? e.preventDefault() : null ;

	    _render('remove');

	}





	function getCurrentFieldIndex() {

		var action = form_professionalExamsPassed.prop('action').split('/');

		var index = action[5];

	    return parseInt(index);

	}





	function getNextFieldIndex() {

		return getCurrentFieldIndex() + 1;

	}





	function getPreviousFieldIndex() {

		return getCurrentFieldIndex() - 1;

	}





	function _render(action) {

		var index = null;

		switch (action) {

			case 'add' :

				index = getNextFieldIndex();

				var html = 

		        '<div class="professional_exams_passed_row">'+

		            '<li class="divider marg_20"></li>'+

		            '<div class="col s12 m6 l6">'+

		                    '<div class="input-field">'+

		                        '<input name="name_of_exam_' + index + '" type="text" required/>'+

		                        '<label>Name of Examination</label>'+

		                   '</div>'+

		                '</div>'+

		                '<div class="col s12 m3 l3">'+

		                    '<div class="input-field">'+

		                        '<input name="date_taken_' + index + '" type="date" required/>'+

		                    '</div>'+

		                '</div>'+

		                '<div class="col s12 m3 l3">'+

		                    '<div class="input-field">'+

		                        '<input name="rating_' + index + '" type="text" required/>'+

		                        '<label>Rating</label>'+

		                    '</div>'+

		                '</div>'+

		            '</div>';

			    professional_exams_passed_fields.append(html);

			    updateFormAction(index);

			break;

			case 'remove' :

				index = getPreviousFieldIndex();

				if(index >= 1) {

					professional_exams_passed_fields.children('.professional_exams_passed_row').last().remove();

		    		updateFormAction(index);

		    	}

			break;

			default :

				return 'Invalid parameter. Must be either "add" or "delete".';

			break;

		}

	}





	function updateFormAction(index) {

		form_professionalExamsPassed.prop('action',window.location.origin + '/survey/professional_exams_passed/' + index );

	}





	return {

		addField : addField,
		removeField : removeField

	}

})();