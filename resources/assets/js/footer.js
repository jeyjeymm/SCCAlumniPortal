var footer = (function(){

	var footer = $('#footer');
	var backToTop = footer.find('#back_to_top');
	var topPage = $("#top");

	backToTop.on('click',function(e){

		e.preventDefault();

		//Scroll to position
	    $('html,body').animate({
	        scrollTop: topPage.offset().top - 80
	    });

	});

})();