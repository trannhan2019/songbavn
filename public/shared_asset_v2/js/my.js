
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
//set button ẩn hiện sidebar menu
$(document).ready(function(){$('#sidebarCollapse').on('click',function(){$('#sidebar').toggleClass('active');});});
//set responsive cho img


//PHẦN COPY TỪ NGUỒN KHÁC - JIBON
/*
    Template Name: Jibon Charity Bootstrap4 Template
    Description: This is html5 template
    Author: #
    Version: 1.0
*/
/*================================================
[  Table of contents  ]
================================================
	01. Sticky Menu
    02. Last 2 li child add class
	03. jQuery MeanMenu
	04. MagnificPopup
    05. Countdown
    06. Owl Carousel
    07. Counter Up
	08. ScrollUp
	09. Wow js
 
======================================
[ End table content ]
======================================*/

(function ($) {
    "use strict";
    
    /*------------------------------------
        01. Sticky Menu
    -------------------------------------- */  
        var windows = $(window);
        var stick = $(".header-sticky");
        windows.on('scroll',function() {    
            var scroll = windows.scrollTop();
            if (scroll < 245) {
                stick.removeClass("sticky");
            }else{
                stick.addClass("sticky");
            }
        }); 
        
    /*------------------------------------
        02. Last 2 li child add class
    -------------------------------------- */  
        $('ul.menu>li').slice(-2).addClass('last-elements');
        
    /*------------------------------------
        03. jQuery MeanMenu
    -------------------------------------- */
        $('.main-menu nav').meanmenu({
            meanScreenWidth: "991",
            meanMenuContainer: '.mobile-menu'
        }); 
        
    /*------------------------------------------
        09. Wow js
    -------------------------------------------- */    
        new WOW().init();
        
    })(jQuery);	