var breakpoint = 736;

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
    // 指定の要素が存在しなければ処理終了
    $(window).on('load', function(){
        var item_box = $('.cartjs_box');
        item_box.addClass('p-cartjs-box');

        // 
        item_box.find('img').prependTo('.p-item__image').addClass('p-item__img'); // 画像の差し替え
        item_box.find('.cartjs_product_name').insertAfter('.p-item__sub-title').addClass('p-item__title'); // 商品名の差し替え
        item_box.find('.cartjs_sales_price td').appendTo('.js-selling-price').addClass('p-item__info-data'); // 販売価格の差し替え
        item_box.find('.cartjs_sales_price').remove(); // 空タグの削除

        // 画像の変更(urlの変更)
        // var single_cartjs_item_url = single_cartjs_item.find('img').attr('src');
        // $('.p-item__image').find('img').attr('src', single_cartjs_item_url);


    });

});

