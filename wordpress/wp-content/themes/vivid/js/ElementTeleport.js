var breakpoint = 736;
var ua = navigator.userAgent; 

/**
 * jQuery
 * 
 */
jQuery(function($){
    // gnavctr
    $(window).on('load resize', function(){
        var window_width = $(window).width()

        if(window_width <= breakpoint ){
            $('.l-main__content-secondary-first').insertBefore('.l-main__content-primary-fifth');
        } else {
            $('.l-main__content-secondary-first').prependTo('.l-main__content-secondary');
        }
    });
});