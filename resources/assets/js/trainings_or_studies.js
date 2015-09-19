var trainings_or_studies = (function(){

	var trainings_or_studies = $('#trainings_or_studies');
	var form_trainingsOrStudies = trainings_or_studies.find('#form_trainingsOrStudies');
	var trainings_or_studies_fields = form_trainingsOrStudies.find('#trainings_or_studies_fields');
	var btn_add = form_trainingsOrStudies.find('#btn_add');
	var btn_remove = form_trainingsOrStudies.find('#btn_remove');




	//Bind Events
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

		var action = form_trainingsOrStudies.prop('action').split('/');

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

		switch (action) {

			case 'add' :

				index = getNextFieldIndex();

				var html = 

	            '<div class="trainings_or_studies_row">'+

	                '<li class="divider marg_20"></li>'+

	                    '<div class="col s12 m4 l4">'+

	                        '<div class="input-field">'+

	                            '<input name="training_or_advanced_study_' + index + '" type="text" required/>'+

	                            '<label>Title of Training or Advanced Study</label>'+

	                        '</div>'+

	                    '</div>'+

	                    '<div class="col s12 m4 l4">'+

	                        '<div class="input-field">'+

	                            '<input name="duration_' + index + '" type="text" required/>'+

	                            '<label>Duration</label>'+

	                        '</div>'+

	                    '</div>'+

	                    '<div class="col s12 m4 l4">'+

	                        '<div class="input-field">'+

	                            '<input name="institution_' + index + '" type="text" required/>'+

	                            '<label>Name of Institution</label>'+

	                        '</div>'+

	                    '</div>'+

	                '</div>'+

	            '</div>';

			    trainings_or_studies_fields.append(html);

			    updateFormAction(index);

			break;

			case 'remove' :

				index = getPreviousFieldIndex();

				if (index >= 1) {

					trainings_or_studies_fields.children('.trainings_or_studies_row').last().remove();

		   			updateFormAction(getPreviousFieldIndex());

		   		}

			break;

			default:

				return 'Invalid parameter. Must be "add" or "remove".';

			break;

		}
	}





	function updateFormAction(index) {

		form_trainingsOrStudies.prop('action',window.location.origin + '/survey/trainings_or_studies/' + index );

	}





	return {

		addField : addField,
		removeField : removeField

	}

})();