var btn_edit_profile = $('#btn_edit_profile');

var profiles_dashboard = $('#profiles_dashboard');
var btn_about = $('#btn_profile_about');
var btn_threads = $('#btn_profile_threads');
var btn_work = $('#btn_profile_work');

var fab_search_profile = $('#fab_search_profile');

var nav_items_container = $('#nav_items_container');
var nav_search_container = $('#nav_search_container');
var nav_search = $('#nav_search');

var profiles_progress_bar = $('#profiles_progress_bar');
var profile_search_result = $('#profile_search_result');
var profile_search_result_header = $('#profile_search_result_header');
var profile_search_result_list = $('#profile_search_result_list');

var profiles_content = $('#profiles_content');





btn_about.on('click',function(){

	var id = profiles_dashboard.find('input').val();

	var getView = $.get('/get/view/profile/'+id+'/profiles.info');

	getView.done(function(view){

		profiles_content.html(view);

	});
});





btn_threads.on('click',function(){

	var id = profiles_dashboard.find('#profile_id').val();

	var getView = $.get('/get/view/threads/'+id+'/profiles.threads');

	getView.done(function(view){

		profiles_content.html(view);

	});

});




/*
btn_edit_profile.on('click',function(){

	var getView = $.get('/get/view/profile/profiles.includes.forms.edit_form/edit');

	getView.done(function(view){

		profiles_content.html(view);

	});

});*/




btn_work.on('click',function(){

	var id = profiles_dashboard.find('#profile_id').val();

	var getView = $.get('/get/view/employment_data/'+id+'/profiles.work');

	getView.done(function(view){

		profiles_content.html(view);

	});

});





fab_search_profile.on('click',function(){

	nav_items_container.toggle();
	nav_search_container.toggle();

	if(nav_search.is(':visible')){
		nav_search.focus();
	}

});




nav_search.on('keyup',function(){

	var input = $(this).val();

	if (input !== '') {

		timer = setTimeout(function(){

				profiles_progress_bar.fadeIn();

				var get = $.get('/profiles/search/' + input);

				get.done(function(profiles){

					if (profiles.length !== 0) {

						var result = '';

						for (var i = 0; i < profiles.length; i++) {

							result += 
								"<a href='" + window.location.origin + "/profiles/" + profiles[i].id + "' class='collection-item avatar'>" +

									"<img src='" + window.location.origin + "/get/photo/profiles."+ profiles[i].id + ".profile_picture/"+profiles[i].image_name + "' alt='Avatar' class='circle'/>" +

									"<span class='title'>" + profiles[i].name + " (" + profiles[i].nickname + ")" + "</span>" +

								"</a>";

						}

						if(!profile_search_result_list.is(':empty')){

							profile_search_result_list.empty();

						}

						if (!profile_search_result_header.is(':empty')) {

							profile_search_result_header.empty().append('Search results for: ' + input);

						}

						profile_search_result_list.append(result);

						profile_search_result.show();

					} else {

						if (!profile_search_result_list.is(':empty')) {

							profile_search_result_list.empty();

						}

						if (!profile_search_result_header.is(':empty')) {

							profile_search_result_header.empty().append('Search results for: ' + input);

						}


						profile_search_result_list.append("<li class='collection-item'> No results found. </li>");

						profile_search_result.show();

					}

					profiles_progress_bar.hide();

				});

		} , .3 * 1000 );

	}

	

}).on('keydown',function(){

	clearTimeout(timer);

}).on('focusout',function(){

	if ($(this).val() === '') {

		nav_search_container.fadeOut();
		nav_items_container.fadeIn();

		profile_search_result.fadeOut();

	}
	
});
