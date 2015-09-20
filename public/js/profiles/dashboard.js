var dashboard = (function(){

	var profiles = $('#profiles');

	var id = profiles.find('#profile_id');

	//var btn_edit = profiles.find('#btn_edit');
	var dashboard = profiles.find('#dashboard');
	var btn_about = profiles.find('#btn_about');
	var btn_threads = profiles.find('#btn_threads');
	var btn_work = profiles.find('#btn_work');

	var content = profiles.find('#content');





	btn_about.on('click',function(){

		var getView = $.get('/get/view/profile/'+ id.val() +'/profiles.includes.info');

		getView.done(function(view){

			content.hide().html(view).fadeIn();

		});
	});





	btn_threads.on('click',function(){

		var getView = $.get('/get/view/threads/'+ id.val() +'/profiles.includes.threads');

		getView.done(function(view){

			content.hide().html(view).fadeIn();

		});

	});




	
	/*btn_edit.on('click',function(){

		var getView = $.get('/get/view/profile/'+ id.val() +'/profiles.edit');

		getView.done(function(view){

			content.html(view);

		});

	});*/




	btn_work.on('click',function(){

		var getView = $.get('/get/view/employment_data/'+ id.val() +'/profiles.includes.work');

		getView.done(function(view){

			content.hide().html(view).fadeIn();

		});

	});

})();