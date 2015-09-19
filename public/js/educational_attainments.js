var educational_attainments = (function() {

	var form_educationalAttainments = $('#form_educationalAttainments');
	var btn_add = form_educationalAttainments.find('#btn_add');
	var btn_remove = form_educationalAttainments.find('#btn_remove');
	var educational_attainment_fields = form_educationalAttainments.find('#educational_attainment_fields');


	//BindEvents
	btn_add.on('click',addField);
	btn_remove.on('click', removeField);





	function addField(e){

	    typeof e != 'undefined' ? e.preventDefault() : null ;

	    _render('add');

	}





	function removeField(e) {

	    typeof e != 'undefined' ? e.preventDefault() : null ;

	    _render('remove');

	}





	function getCurrentFieldIndex() {

		var action = form_educationalAttainments.prop('action').split('/');

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
				            
	            '<div class="educational_attainment_row">'+

	                    '<li class="divider marg_20"></li>'+

	                    '<div class="input-field">'+

	                        '<input name="degree_' + index + '" type="text" required/>'+

	                        '<label class="truncate">Degree(s) & Specialization</label>'+

	                    '</div>'+

	                    '<div class="input-field">'+

	                        '<input name="college_or_university_' + index + '" type="text" required/>'+

	                        '<label class="truncate">College or University</label>'+

	                    '</div>'+

	                    '<div class="input-field">'+

	                        '<input name="year_graduated_' + index + '" type="text" required/>'+

	                        '<label class="truncate">Year Graduated</label>'+

	                    '</div>'+

	                    '<div class="input-field">'+

	                        '<input name="honors_or_awards_' + index + '" type="text"/>'+

	                        '<label class="truncate">Honors or Awards Received</label>'+

	                    '</div>'+

	            '</div>';

			    educational_attainment_fields.append(html);

			    updateFormAction(index);

			break;

			case 'remove' :

				index = getPreviousFieldIndex();

				if (index >= 1) {

				   	educational_attainment_fields.children('.educational_attainment_row').last().remove();

				   	updateFormAction(index);

			   	}

			break;

			default :

				return 'Invalid Parameter. Must either be "add" or "remove".'

			break

		}

	}





	function updateFormAction(index) {

		form_educationalAttainments.prop('action',window.location.origin + '/survey/educational_attainments/' + index );

	}





	return {

		addField : addField,
		removeField : removeField

	}

})();