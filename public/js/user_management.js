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
var course_field = form_user_management.find('#course_id');
var role_field = form_user_management.find('#role_id');

var u_btn_submit = form_user_management.find('#btn_submit');
var u_btn_delete = form_user_management.find('#btn_delete');
var u_btn_goto_profile = form_user_management.find('#btn_goto_profile');


var user_management_search = $('#user_management_search');
var search_type = user_management_search.find('#search_type');
var order_by = user_management_search.find('#order_by');
var order_by_direction = user_management_search.find('#order_by_direction');
var user_search = $('#user_search');

var btn_create_account = tbl_user_management_container.find('#btn_create_account'); 

var id;
var profile_id;
var name;
var email;
var username;
var department_id;
var course_id;
var role_id;


var input = '';


tbl_user_management.on('click','tr',function(){

	var selection = $(this);

	tbl_user_management_container.hide();
	form_user_management_container.show();

	var td_id = selection.find('#id');
	var td_name = selection.find('#name');
	var td_email = selection.find('#email');
	var td_username = selection.find('#username');
	var td_department = selection.find('#department');
	var td_course = selection.find('#course');
	var td_role = selection.find('#role');
	var profile_id = selection.find('#profile_id');

	id = td_id.val();
	profile_id = profile_id.val();
	name = td_name.val();
	email = td_email.val();
	username = td_username.val();
	course_id = td_course.val();
	department_id = td_department.val();

	role_id = td_role.val();

	var arr = [id,name,email,username,department_id,course_id,role_id,profile_id];

	setUserManagementForm(arr);

});


u_back_btn.on('click',function(e){

	e.preventDefault();

	form_user_management_container.toggle();
	tbl_user_management_container.toggle();

});


function setUserManagementForm(data){

	form_user_management.prop('action', window.location.origin + '/users/' + id);
	u_laravel_method.prop('name','_method');
	u_laravel_method.prop('value','PATCH');

	//id_field.val(data[0]);
	//lbl_id.addClass('active');

	name_field.val(data[1]);
	lbl_name.addClass('active');

	email_field.val(data[2]);
	lbl_email.addClass('active');

	username_field.val(data[3]);
	lbl_username.addClass('active');

	department_field.val(data[4]);
	course_field.val(data[5]);
	role_field.val(data[6]);

	$('select').material_select('update');
    $('select').closest('.input-field').children('span.caret').remove();

	u_btn_submit.text('Update User Info');
	u_btn_delete.prop('href', window.location.origin + '/users/' + data[0] + '/destroy');

	if (data[7]) {

		u_btn_goto_profile.is(':visible') ? '' : u_btn_goto_profile.show() ;

		u_btn_goto_profile.prop('href', window.location.origin + '/profiles/' + data[7]);

	} else {

		u_btn_goto_profile.is(':visible') ? u_btn_goto_profile.hide() : '' ;

	}

}


user_search.on('keyup',function(){

	input = $(this).val();

	if (input !== '') {

		timer = setTimeout(function(){

			var type = search_type.val();
			var order = order_by.val();
			var order_direction = order_by_direction.val();

			userQuery(type, input, order, order_direction);

		},.5 * 1000);

	} else {

		var type = search_type.val();
		var order = order_by.val();
		var order_direction = order_by_direction.val();

		userQuery(type, '*', order, order_direction);

	}

}).on('keydown',function(){

	clearTimeout(timer);

});



order_by.on('change',function(){

	var type = search_type.val();
	var order = order_by.val();
	var order_direction = order_by_direction.val();

	userQuery(type,input,order,order_direction);

});


order_by_direction.on('change',function(){

	var type = search_type.val();
	var order = order_by.val();
	var order_direction = order_by_direction.val();

	userQuery(type,input,order,order_direction);

});


btn_create_account.on('click',function(){

	var arr = ['','','','','1','1','1'];
	setUserManagementForm(arr);
	form_user_management_container.toggle();
	tbl_user_management_container.toggle();

});


function userQuery(type,input,order,order_direction){

	var i = input !== '' ? input : '*';

	tbl_users_progress_bar.show();

	var get = $.get('/users/search/' + type + '/' + i + '/' + order + '.' + order_direction);

		get.done(function(view){

			if (!tbl_users_pagination.is(':empty')) {

				tbl_users_pagination.empty();

			}

			tbl_user_management.html(view);

			tbl_users_progress_bar.hide();
			
		});

}