$('#btn_back_to_top').on('click',function(e){
	e.preventDefault();

	//Scroll to position
    $('html,body').animate({
        scrollTop: $("#top").offset().top - 80
    });

});