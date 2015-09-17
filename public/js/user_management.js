var tbl_user_management_container = $('#tbl_user_management_container');
var tbl_user_management = $('#tbl_user_management');
var tbl_users_pagination = tbl_user_management_container.find('#tbl_users_pagination');
var tbl_users_progress_bar = tbl_user_management_container.find('#tbl_users_progress_bar');

var form_user_management_container = $('#form_user_management_container');
var form_user_management = $('#form_user_management');
var u_back_btn = form_user_management.find('#btn_back');
var u_laravel_method = form_user_management.find('#laravel_method');

//var lbl_id = form_user_management.find('#lbl_id');
var lbl_name = form_user_management.find('#lbl_name');
var lbl_email = form_user_management.find('#lbl_email');
var lbl_username = form_user_management.find('#lbl_username');

//var id_field = form_user_management.find('#id');
var name_field = form_user_management.find('#name');
var email_field = form_user_management.find('#email');
var username_field = form_user_management.find('#username');
var department_field = form_user_management.find('#department_id');
//var course_field = form_user_management.find('#course_id');
var role_field = form_user_management.find('#role_id');

var u_btn_submit = form_user_management.find('#btn_submit');
var u_btn_delete = form_user_management.find('#btn_delete');
var u_btn_goto_profile = form_user_management.find('#btn_goto_profile');


var user_management_search = $('#user_management_search');
var search_type = user_management_search.find('#search_type');
var order_by = user_management_search.find('#order_by');
var order_by_direction = user_management_search.find('#order_by_direction');
var department_filter = user_management_search.find('#department_filter');
var user_search = $('#user_search');

var lbl_print_department = tbl_user_management_container.find('#lbl_print_department');

var btn_print_table = tbl_user_management_container.find('#btn_print_table');
var btn_create_account = tbl_user_management_container.find('#btn_create_account'); 

var id;
var profile_id;
var name;
var email;
var username;
var department_id;
var course_id;
var role_id;


var search_input_val = '';
var search_type_val = '';
var search_order_val = '';
var search_order_direction_val = '';
var department_filter_val = '';


tbl_user_management.on('click','tr',function(){

	var selection = $(this);

	tbl_user_management_container.hide();

	var td_id = selection.find('#id');
	var td_name = selection.find('#name');
	var td_email = selection.find('#email');
	var td_username = selection.find('#username');
	var td_department = selection.find('#department');
	//var td_course = selection.find('#course');
	var td_role = selection.find('#role');
	var profile_id = selection.find('#profile_id');

	id = td_id.val();
	profile_id = profile_id.val();
	name = td_name.val();
	email = td_email.val();
	username = td_username.val();
	//course_id = td_course.val();
	department_id = td_department.val();

	role_id = td_role.val();

	//var arr = [id,name,email,username,department_id,course_id,role_id,profile_id];
	var arr = {

		id : id,
		name : name,
		email : email,
		username : username,
		department_id : department_id,
		role_id : role_id,
		profile_id : profile_id

	};

	setUserManagementForm(arr,'edit');
	form_user_management_container.show();

});


u_back_btn.on('click',function(e){

	e.preventDefault();

	form_user_management_container.toggle();
	tbl_user_management_container.toggle();

});


function setUserManagementForm(data,action){

	if(action === 'edit'){

		form_user_management.prop('action', window.location.origin + '/users/' + id);
		u_laravel_method.prop('name','_method');
		u_laravel_method.prop('value','PATCH');

		//id_field.val(data[0]);
		//lbl_id.addClass('active');

		name_field.val(data.name);
		lbl_name.addClass('active');

		email_field.val(data.email);
		lbl_email.addClass('active');

		username_field.val(data.username);
		lbl_username.addClass('active');

		department_field.val(data.department_id);
		//course_field.val(data[5]);
		role_field.val(data.role_id);

		$('select').material_select('update');

		u_btn_submit.text('Update User Info');
		u_btn_delete.prop('href', window.location.origin + '/users/' + data.id + '/destroy').show();

		if (data.profile_id) {

			u_btn_goto_profile.is(':visible') ? '' : u_btn_goto_profile.show() ;

			u_btn_goto_profile.prop('href', window.location.origin + '/profiles/' + data.profile_id);

		} else {

			u_btn_goto_profile.is(':visible') ? u_btn_goto_profile.hide() : '' ;

		}

	} else {


		//id_field.val(data[0]);
		//lbl_id.addClass('active');

		name_field.val('');

		email_field.val('');

		username_field.val('');

		department_field.val(null);
		//course_field.val(1);
		role_field.val(null);

		$('select').material_select('update');

		u_btn_submit.text('Create User');
		u_btn_delete.hide();
		u_btn_goto_profile.hide();

	}

}


user_search.on('keyup',function(){

	search_input_val = $(this).val();

	if (search_input_val !== '') {

		timer = setTimeout(function(){

			getSearchValues();
			userQuery(search_type_val,search_input_val,search_order_val,search_order_direction_val,department_filter_val);

		},.5 * 1000);

	} else {

		getSearchValues();
		userQuery(search_type_val,search_input_val,search_order_val,search_order_direction_val,department_filter_val);

	}

}).on('keydown',function(){

	clearTimeout(timer);

});



order_by.on('change',function(){

	getSearchValues();
	userQuery(search_type_val,search_input_val,search_order_val,search_order_direction_val,department_filter_val);

});


order_by_direction.on('change',function(){

	getSearchValues();
	userQuery(search_type_val,search_input_val,search_order_val,search_order_direction_val,department_filter_val);

});


department_filter.on('change',function(){

	getSearchValues();
	userQuery(search_type_val,search_input_val,search_order_val,search_order_direction_val,department_filter_val);

});


btn_print_table.on('click',function(e){

	e.preventDefault();

	user_management_search.hide();
	var nav = $('nav');
	var footer = $('footer');

	nav.hide();
	footer.hide();
	btn_create_account.hide();
	btn_print_table.hide();
	lbl_print_department.html('<b>' + department_filter.children("option").filter(":selected").text() + '</b>').show();


	window.print();


	lbl_print_department.hide();
	user_management_search.show();
	nav.show();
	footer.show();
	btn_create_account.show();
	btn_print_table.show();

});


btn_create_account.on('click',function(){

	setUserManagementForm(null, 'create');
	form_user_management_container.toggle();
	tbl_user_management_container.toggle();

});


function getSearchValues() {

	search_type_val = search_type.val();
	search_order_val = order_by.val();
	search_order_direction_val = order_by_direction.val();
	department_filter_val = department_filter.val();

}


function userQuery(type,input,order,order_direction,department){

	var i = input !== '' ? input : '*';

	tbl_users_progress_bar.show();

	var get = $.get('/users/search/' + type + '/' + i + '/' + department + '/' + order + '.' + order_direction);

		get.done(function(view){

			if (!tbl_users_pagination.is(':empty')) {

				tbl_users_pagination.empty();

			}

			tbl_user_management.html(view);

			tbl_users_progress_bar.hide();
			
		});

}