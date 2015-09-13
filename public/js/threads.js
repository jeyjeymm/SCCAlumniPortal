var threads_collection = $('#threads_collection');

var thread_modal = $('#thread_modal');
var t_modal_header = thread_modal.find('#modal_header');
var t_modal_edit_btn = thread_modal.find('#modal_edit');
var t_modal_delete_btn = thread_modal.find('#modal_delete');

var t_delete_modal = $('#delete_modal');
var t_delete_modal_yes = t_delete_modal.find('#delete_modal_yes');



var thread_container = $('#thread_container');
var lbl_thread_title = thread_container.find('#lbl_thread_title');
var txt_thread_title = thread_container.find('#txt_thread_title');



var form_thread = thread_container.find('#form_thread');
var t_laravel_method = form_thread.find('.laravel_method');
var t_btn_submit = form_thread.find('#btn_submit');



var fab_post_thread = $('#fab_post_thread');


var thread_id;
var is_ownership_valid;



/*
*
*	Show threads form on fab click
*
*/
fab_post_thread.on('click',function(e){

	e.preventDefault();

	thread_container.fadeToggle();

});




/*
*
*	Show modal on thread long press
*
*/

threads_collection.on("mousedown",'a',function(){

	var selection = $(this);

	is_ownership_valid = selection.find('#thread_ownership_validation').val();

	if(is_ownership_valid){

		var title = selection.find('#thread_title').text();

		var temp =  selection.prop('id');

		thread_id = temp.split('_')[1];

	    timer = setTimeout(function(){

	        t_modal_header.text(title);
	        thread_modal.openModal();

	    }, .5 * 1000 );

	}

}).on("mouseup mouseleave",function(){

	if(is_ownership_valid){

	    clearTimeout(timer);

	}

});




/*
*
*	Prepare thread form on thread edit
*
*/
t_modal_edit_btn.on('click',function(){

	var get = $.get('/threads/' + thread_id + '/edit');

	get.done(function(data){

		if(!thread_container.is(':visible')){

			thread_container.show();
		}

		form_thread.prop('action', window.location.origin + '/threads/' + thread_id);

		t_laravel_method.prop('name','_method');
		t_laravel_method.prop('value','PATCH');

		txt_thread_title.val(data.title);
		lbl_thread_title.addClass('active');

		CKEDITOR.instances.body.setData(data.body);

		t_btn_submit.text('Update Thread');

	});

});





t_modal_delete_btn.on('click',function(){

	t_delete_modal.openModal();

});





t_delete_modal_yes.on('click',function(){

	var get = $.get('/threads/'+thread_id+'/destroy');

	get.done(function(url){

		window.location = url;

	});

});