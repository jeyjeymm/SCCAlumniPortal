var comments = (function() {

	var comments = $('#comments');

	var form_commentContainer = $('.form_commentContainer');
	var article_comments_container = $('#article_comments_container');

	var form_comment = form_commentContainer.find('#form_comment');
	var laravel_method = form_comment.find('.laravel_method');
	var btn_submit = form_comment.find('#btn_submit');



	var comment_modal = $('#comment_modal');
	var btn_edit = comment_modal.find('#modal_edit');
	var btn_delete = comment_modal.find('#modal_delete');

	var delete_modal = $('#delete_modal');
	var btn_yes = delete_modal.find('#btn_yes');



	var btn_open_modal = $('.open_comment_modal');



	var model_id;



	var fab_postComment = $('#fab_post_comment');
	var btn_postArticleComment = $('#btn_article_comment');



	var comment_id;
	var comment_page;





	/*
	*
	*	Show comments form on fab click in threads page
	*
	*/
	fab_postComment.on('click',function(e){

		e.preventDefault();

		form_commentContainer.fadeToggle();

	});

	/*
	*
	*	Show comments form on fab click in articles page
	*
	*/
	btn_postArticleComment.on('click',function(e){

	    e.preventDefault();
	    article_comments_container.fadeToggle();
	    
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





	btn_edit.on('click',function(){

		//console.log('/' + comment_page + '/' + model_id + '/comments/' + comment_id + '/edit');

		var get = $.get('/' + comment_page + '/' + model_id + '/comments/' + comment_id + '/edit');

		get.done(function(data){

			if(!form_commentContainer.is(':visible')){

				form_commentContainer.show();

			}

			form_comment.prop('action', window.location.origin + '/' + comment_page + '/'+ model_id + '/comments/' + comment_id);

			laravel_method.prop('name','_method');
			laravel_method.prop('value','PATCH');

			CKEDITOR.instances.comment.setData(data.comment);

			btn_submit.text('Update Comment');

		});

	});





	btn_delete.on('click',function(){

		delete_modal.openModal();

	});





	btn_yes.on('click',function(){

		//console.log('/' + comment_page + '/' + model_id + '/comments/' + comment_id + '/destroy');

		var get = $.get('/' + comment_page + '/' + model_id + '/comments/' + comment_id + '/destroy');

		get.done(function(url){

			window.location = url;

		});

	});

})();