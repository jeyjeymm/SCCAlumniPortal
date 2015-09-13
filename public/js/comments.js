var comment_container = $('.comment_container');



var form_comment = comment_container.find('#form_comment');
var c_laravel_method = form_comment.find('.laravel_method');
var c_btn_submit = form_comment.find('#btn_submit');



var comment_modal = $('#comment_modal');
var c_modal_edit_btn = comment_modal.find('#modal_edit');
var c_modal_delete_btn = comment_modal.find('#modal_delete');

var c_delete_modal = $('#delete_modal');
var c_delete_modal_yes = c_delete_modal.find('#delete_modal_yes');



var btn_open_modal = $('.open_comment_modal');



var model_id;



var fab_post_comment = $('#fab_post_comment');



var comment_id;
var comment_page;





/*
*
*	Show comments form on fab click in threads page
*
*/
fab_post_comment.on('click',function(e){

	e.preventDefault();

	comment_container.fadeToggle();

});

/*
*
*	Show comments form on fab click in articles page
*
*/
$('#btn_article_comment').on('click',function(e){

    e.preventDefault();
    $('#article_comments').fadeToggle();
    
});





btn_open_modal.on('click','a',function(e){

	e.preventDefault();

	var temp = $(this).prop('id');
	var arr = temp.split('_');


	model_id = arr[1];
	comment_id = arr[2];
	comment_page = arr[0];

	comment_modal.openModal();

});





c_modal_edit_btn.on('click',function(){

	console.log('/' + comment_page + '/' + model_id + '/comments/' + comment_id + '/edit');

	var get = $.get('/' + comment_page + '/' + model_id + '/comments/' + comment_id + '/edit');

	get.done(function(data){

		if(!comment_container.is(':visible')){

			comment_container.show();

		}

		form_comment.prop('action', window.location.origin + '/' + comment_page + '/'+ model_id + '/comments/' + comment_id);

		c_laravel_method.prop('name','_method');
		c_laravel_method.prop('value','PATCH');

		CKEDITOR.instances.comment.setData(data.comment);

		c_btn_submit.text('Update Comment');

	});

});





c_modal_delete_btn.on('click',function(){

	c_delete_modal.openModal();

});





c_delete_modal_yes.on('click',function(){

	console.log('/' + comment_page + '/' + model_id + '/comments/' + comment_id + '/destroy');

	var get = $.get('/' + comment_page + '/' + model_id + '/comments/' + comment_id + '/destroy');

	get.done(function(url){

		window.location = url;

	});

});