var sidebar = (function() {

	var profiles = $('#profiles');

	var sidebar = profiles.find('#sidebar');
	var form_emailAFriend = sidebar.find('#form_emailAFriend');
	var friend_email = sidebar.find('#friend_email');
	var progressBar = sidebar.find('#progress_bar');
	


	form_emailAFriend.on('submit',emailAFriend);

	function emailAFriend(e){

		typeof e !== 'undefined' ? e.preventDefault() : null ;

		var email = friend_email.val();

		form_emailAFriend.hide();
		progressBar.show();

	   	var get = $.get(window.location.origin + '/profiles/email/' + email);

	   	get.done(function(data){

	   		progressBar.hide();
	   		friend_email.val('');
	   		form_emailAFriend.show();

	   		alert(data);

	   	});
	}

})();