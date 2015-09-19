var threads = (function() {

	var timer;

	var threads = $('#threads');
	var modal = $('#thread_modal');

	var threads_collection = threads.find('#threads_collection');
	var form_threadContainer = $('#form_threadContainer');

	var fab_post_thread = $('#fab_post_thread');


	var is_thread_owner;



	/*
	*
	*	Show threads form on fab click
	*
	*/
	fab_post_thread.on('click',toggleThreadForm);




	/*
	*
	*	Show modal on thread long press
	*
	*/

	threads_collection.on("mousedown",'a',openModal)
						.on("mouseup mouseleave",clearTimer);





	function openModal(){

		var selection = $(this);

		is_thread_owner = selection.find('#thread_ownership_validation').val();

		if(is_thread_owner){

			var title = selection.find('#thread_title').text();

			var temp =  selection.prop('id');

			var id = temp.split('_')[1];

		    timer = setTimeout(function(){

		        thread_modal.setTitle(title);
		        thread_modal.setId(id);
		        thread_modal.init();

		    }, .5 * 1000 );

		}
	}





	function clearTimer(){

		if(is_thread_owner){

		    clearTimeout(timer);

		}

	}




	function toggleThreadForm(){

		form_threadContainer.fadeToggle();

	}



	return {

		openModal : openModal

	}



})();


var thread_modal = {

	title : '',
	id : '',

	init : function() {

		this.cacheDOM();
		this.bindEvents();
		this.modal_header.text(this.title);
		this.modal.openModal();

	},

	cacheDOM : function() {

		this.modal = $('#thread_modal');
		this.modal_header = this.modal.find('#modal_header');
		this.btn_edit = this.modal.find('#modal_edit');
		this.btn_delete = this.modal.find('#modal_delete');

		this.delete_modal = $('#delete_modal');	
		this.btn_yes = this.delete_modal.find('#btn_yes');

		this.form_threadContainer = $('#form_threadContainer');
		this.form_thread = this.form_threadContainer.find('#form_thread');
		this.laravel_method = this.form_thread.find('.laravel_method');

		this.lbl_title = this.form_thread.find('#lbl_title');
		this.thread_title = this.form_thread.find('#title');
		this.thread_body = CKEDITOR.instances.body;
		
		this.btn_submit = this.form_thread.find('#btn_submit');

	},

	bindEvents : function() {


		this.btn_edit.on('click',this.prepareThreadEdit.bind(this));
		this.btn_delete.on('click',this.showDeleteModal.bind(this));
		this.btn_yes.on('click',this.deleteThread.bind(this));


	},

	prepareThreadEdit : function() {

		var get = $.get('/threads/' + this.id + '/edit');

		get.done(function(data){

			if(!this.form_threadContainer.is(':visible')){

				this.form_threadContainer.show();
			}

			this.form_thread.prop('action', window.location.origin + '/threads/' + this.id );

			this.laravel_method.prop('name','_method');
			this.laravel_method.prop('value','PATCH');

			this.thread_title.val(data.title);
			this.lbl_title.addClass('active');

			this.thread_body.setData(data.body);

			this.btn_submit.text('Update Thread');

		}.bind(this));

	},

	showDeleteModal : function(){

		this.delete_modal.openModal();

	},

	deleteThread : function(){

		var get = $.get('/threads/' + this.id + '/destroy');

		get.done(function(url){

			window.location = url;

		});

	},

	setId : function(id) {

		this.id = id;

	},

	setTitle : function(title) {

		this.title = title;

	}

}