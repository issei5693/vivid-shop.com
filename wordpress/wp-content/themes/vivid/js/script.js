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
            $('#gnavctr').toggleClass('gnavctr-close');
            $('#gnavctr').removeClass('gnavctr-remove');
            
        } else {
            $('#gnavctr').addClass('gnavctr-remove');
        }
    });

    $('#gnavctr-switch-opn').on('click',function(){
        $('#gnavctr').toggleClass('gnavctr-open');
        $('#gnavctr').toggleClass('gnavctr-close');
    })

    $('#gnavctr-switch-cls').on('click',function(){
        $('#gnavctr').toggleClass('gnavctr-open');
        $('#gnavctr').toggleClass('gnavctr-close');
    })

    // dynamic-search-area
     $('#dynamic-search-area-switch').on('click', function(){
         $('#dynamic-search-area').toggleClass('dynamic-search-area-open')
     })

     $(window).on('load resize', function(){
        var window_width = $(window).width()

        if(window_width <= breakpoint ){
            $('#dynamic-search-area').removeClass('dynamic-search-area-remove');
        } else {
            $('#dynamic-search-area').addClass('dynamic-search-area-remove');
        }
    });

    // archive item controll
    $(window).on('load', function(){
        var archive_items = $('.archive-cart-js-item');
        
        archive_items.each(function(){
            var cartjs_box  =   $(this).find('.cartjs_box');

            // 商品画像の差し替え
            var item_img_url = cartjs_box.find('.cartjs_product_img img').attr('src');
            $(this).find('.c-card__img').attr('src', item_img_url);
            cartjs_box.find('.cartjs_product_img img').remove();

            // アイテム名の差し替え
            var item_name = cartjs_box.find('.cartjs_product_name').text();
            $(this).find('.c-card__title .c-card__section').eq(1).text(item_name);
            cartjs_box.find('.cartjs_product_name').remove();

            // 販売価格の差し替え
            var item_selling_price = cartjs_box.find('.cartjs_sales_price td').text();
            $(this).find('.c-card__price').text(item_selling_price);
            cartjs_box.find('.cartjs_sales_price').remove();

            //off率の挿入
            var int_list_price      = $(this).find('s').text().replace(/[^0-9]/g, '');
            var int_selling_price   = item_selling_price.replace(/[^0-9]/g, '');
            var off_per             = (int_list_price - int_selling_price)/int_list_price * 100;
            if( int_list_price == 0) off_per = 0;
            $(this).find('.c-card__content').prepend('<span class="c-card__section">' + off_per + ' %OFF</span>');

        });
    });

});

