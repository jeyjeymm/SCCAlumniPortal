var pagination = $('ul.pagination');
var pagination_pages = pagination.find('li.pagination_pages');
var pagination_arrows = pagination.find('li.pagination_arrows');
var back_arrow = pagination.find('#btn_back');
var forward_arrow = pagination.find('#btn_forward');
var nav_progress_bar = $('#nav_progress_bar');
var my_articles = $('#my_articles');
var current_page = 1;

pagination_pages.on('click', function (e) {
    e.preventDefault();
    var action = $(this).find('a').attr('href');
    var page = $(this).find('a').attr('value');
    
    checkPaginationArrows(page);
    
    pagination_pages.removeClass('active');
    $(this).addClass('active');
    
    nav_progress_bar.show();

    //Scroll to position
    $('html,body').animate({
        scrollTop: $("#announcement_header").offset().top - 80
    });

    var post = $.post('./php/Controller.php',
    {
        action: action,
        page: page
    });

    post.done(function (data) {
        //$(this).parent().closest().addClass('active');
        my_articles.empty();
        my_articles.html(data);
        nav_progress_bar.hide();
    });
});

pagination_arrows.on('click',function(e){
    e.preventDefault();
    alert('a');
});

function checkPaginationArrows(page){
    if(page !== pagination_pages.first().text()){
        back_arrow.removeClass('disabled');
    }else{
        back_arrow.addClass('disabled');
    }
    
    if(page !== pagination_pages.last().text()){
        forward_arrow.removeClass('disabled');
    }else{
        forward_arrow.addClass('disabled');
    }
    current_page = page;
}

