var breakpoint = 736;
var ua = navigator.userAgent; 

/**
 * jQueryでの記述
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

    //item-controll
    $(window).on('load', function(){
        var item_box = $('.cartjs_box');
        item_box.addClass('p-cartjs-box');

         // 画像の差し替え
        item_box.find('img').prependTo('.p-item__image').addClass('p-item__img');
        
        // 商品名の差し替え
        if ( ua.match(/Mobile/) && !ua.match(/iPad/)) {
            // SP
            var item_name = item_box.find('h2').text();
            item_box.find('h2').remove();
        } else {
            // PC(iPad)
            var item_name = item_box.find('.cartjs_product_name').text();
            item_box.find('.cartjs_product_name').remove();
        }
        $('.p-item__title').text(item_name);
        
        // 販売価格の差し替え
        var selling_price = item_box.find('.cartjs_sales_price td').text();
        $('.js-selling-price .p-item__info-data').text(selling_price);
        item_box.find('.cartjs_sales_price').remove();

        // Off率の挿入
        var int_list_price      = $('.p-item__info s').text().replace(/[^0-9]/g, '');
        var int_selling_price   = selling_price.replace(/[^0-9]/g, '');
        var off_per             = (int_list_price - int_selling_price)/int_list_price * 100;
        if( int_list_price == 0) off_per = 0;
        $('.js-selling-price .p-item__info-data').append('<span>'+ off_per +'%OFF</span>');

        // 画像の変更(urlの変更)
        // var single_cartjs_item_url = single_cartjs_item.find('img').attr('src');
        // $('.p-item__image').find('img').attr('src', single_cartjs_item_url);


    });

});

