var profiles = (function() {

	var header = $('#header');
	var profiles = $('#profiles');
	var fab_search = $('#fab_search');

	var id = profiles.find('#profile_id');

	//var btn_edit = profiles.find('#btn_edit');
	var dashboard = profiles.find('#dashboard');
	var btn_about = profiles.find('#btn_about');
	var btn_threads = profiles.find('#btn_threads');
	var btn_work = profiles.find('#btn_work');


	var mainContainer = header.find('#main_container');
	var searchContainer = header.find('#search_container');
	var input_search = header.find('#input_search');

	var progressBar = profiles.find('#progress_bar');
	var search_results = profiles.find('#search_results');
	var search_resultsHeader = profiles.find('#search_results_header');
	var search_resultsList = profiles.find('#search_results_list');

	var content = profiles.find('#content');





	btn_about.on('click',function(){

		var getView = $.get('/get/view/profile/'+ id.val() +'/profiles.includes.info');

		getView.done(function(view){

			content.html(view);

		});
	});





	btn_threads.on('click',function(){

		var getView = $.get('/get/view/threads/'+ id.val() +'/profiles.includes.threads');

		getView.done(function(view){

			content.html(view);

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

							if(!search_resultsList.is(':empty')){

								search_resultsList.empty();

							}

							if (!search_resultsHeader.is(':empty')) {

								search_resultsHeader.empty().append('Search results for: ' + input);

							}

							search_resultsList.append(result);

							search_results.show();

						} else {

							if (!search_resultsList.is(':empty')) {

								search_resultsList.empty();

							}

							if (!search_resultsHeader.is(':empty')) {

								search_resultsHeader.empty().append('Search results for: ' + input);

							}


							search_resultsList.append("<li class='collection-item'> No results found. </li>");

							search_results.show();

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

			search_results.hide();

		}
		
	});

})();