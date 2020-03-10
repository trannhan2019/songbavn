
$(document).ready(function(){
// set height = nhau
    var leftHeight = $('.home-left').height();
    $('.home-right').css({'height':leftHeight});
// button top
    $(window).scroll(function(){
        if ($(this).scrollTop() > 200) {
            $('.on_top').fadeIn();
        } else {
            $('.on_top').fadeOut();
        }
    });
    $('.on_top').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 700);
        return false;
    });

// set thuộc tinh hover menu
    $('ul.navbar-nav li.dropdown').hover(function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(100);
    }, function() {
      $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
    });

    //set ẩn hiển sidebar menu
    $('#btn-toggle').click(function() {
        $('#sidebar-menu').toggleClass('d-none');
    });
});