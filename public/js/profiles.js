var profiles = (function() {

	var header = $('#header');
	var profiles = $('#profiles');
	var fab_search = $('#fab_search');

	var id = profiles.find('#profile_id');

	var btn_edit = profiles.find('#btn_edit');
	var dashboard = profiles.find('#dashboard');
	var btn_about = profiles.find('#btn_about');
	var btn_threads = profiles.find('#btn_threads');
	var btn_work = profiles.find('#btn_work');


	var mainContainer = header.find('#main_container');
	var searchContainer = header.find('#search_container');
	var input_search = header.find('#input_search');

	var progressBar = profiles.find('#progress_bar');
	var search_result = profiles.find('#search_result');
	var search_resultHeader = profiles.find('#search_result_header');
	var search_resultList = profiles.find('#search_result_list');

	var content = profiles.find('#content');





	btn_about.on('click',function(){

		var getView = $.get('/get/view/profile/'+ id.val() +'/profiles.info');

		getView.done(function(view){

			content.html(view);

		});
	});





	btn_threads.on('click',function(){

		var getView = $.get('/get/view/threads/'+ id.val() +'/profiles.threads');

		getView.done(function(view){

			content.html(view);

		});

	});




	/*
	btn_edit.on('click',function(){

		var getView = $.get('/get/view/profile/profiles.includes.forms.edit_form/edit');

		getView.done(function(view){

			content.html(view);

		});

	});*/




	btn_work.on('click',function(){

		var getView = $.get('/get/view/employment_data/'+ id.val() +'/profiles.work');

		getView.done(function(view){

			content.html(view);

		});

	});





	fab_search.on('click',function(){

		mainContainer.toggle();
		searchContainer.toggle();

		if(input_search.is(':visible')){

			input_search.focus();

		}

	});




	input_search.on('keyup',function(){

		var input = $(this).val();

		if (input !== '') {

			timer = setTimeout(function(){

					progressBar.fadeIn();

					var get = $.get('/profiles/search/' + input);

					get.done(function(profiles){

						if (profiles.length !== 0) {

							var result = '';

							for (var i = 0; i < profiles.length; i++) {

								var image_name = profiles[i].image_name !== '' ? profiles[i].image_name : 'default' ;

								result += 
									"<a href='" + window.location.origin + "/profiles/" + profiles[i].id + "' class='collection-item avatar'>" +

										"<img src='" + window.location.origin + "/get/photo/profiles."+ profiles[i].id + ".profile_picture/" + image_name + "' alt='Avatar' class='circle'/>" +

										"<span class='title'>" + profiles[i].name + " (" + profiles[i].nickname + ")" + "</span>" +

									"</a>";

							}

							if(!search_resultList.is(':empty')){

								search_resultList.empty();

							}

							if (!search_resultHeader.is(':empty')) {

								search_resultHeader.empty().append('Search results for: ' + input);

							}

							search_resultList.append(result);

							search_result.show();

						} else {

							if (!search_resultList.is(':empty')) {

								search_resultList.empty();

							}

							if (!search_resultHeader.is(':empty')) {

								search_resultHeader.empty().append('Search results for: ' + input);

							}


							search_resultList.append("<li class='collection-item'> No results found. </li>");

							search_result.show();

						}

						progressBar.hide();

					});

			} , .3 * 1000 );

		}

		

	}).on('keydown',function(){

		clearTimeout(timer);

	}).on('focusout',function(){

		if ($(this).val() === '') {

			mainContainer.fadeIn();
			searchContainer.hide();

			search_result.hide();

		}
		
	});

})();