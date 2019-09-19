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
            var target_item_img_elm = ( ua.match(/Mobile/) && !ua.match(/iPad/)) ? '#swipe_image' : '.cartjs_product_img img';
            var item_img_url = cartjs_box.find(target_item_img_elm).attr('src');
            $(this).find('.acji-item-img').attr('src', item_img_url);
            cartjs_box.find(target_item_img_elm).remove();

            // アイテム名の差し替え
            var target_item_name_elm = ( ua.match(/Mobile/) && !ua.match(/iPad/)) ? 'h2' : '.cartjs_product_name';
            var item_name = cartjs_box.find(target_item_name_elm).text();
            $(this).find('.acji-item-name').text(item_name); 
            cartjs_box.find(target_item_name_elm).remove();
            

            // 販売価格の差し替え
            var item_selling_price = cartjs_box.find('.cartjs_sales_price td').text();
            $(this).find('.acji-item-price').text(item_selling_price);
            cartjs_box.find('.cartjs_sales_price').remove();

            //off率の挿入
            var int_list_price      = $(this).find('s').text().replace(/[^0-9]/g, '');
            var int_selling_price   = item_selling_price.replace(/[^0-9]/g, '');
            var off_per             = Math.floor( (int_list_price - int_selling_price)/int_list_price * 100 );
            if( int_list_price == 0) off_per = 0;
            $(this).find('.acji-item-off').text(off_per + '%OFF').css('display','block');

            // scriptカートCSSへCSSを適用
            cartjs_box.addClass('p-archive-cartjs-box');

            // selectタグにプルダウン用のラッパーhtmlを追加
            var cartjs_option = cartjs_box.find('.cartjs_option select');
            cartjs_option.wrap('<span class="pulldown_wrapper"></span>');

            // 在庫数の中央揃え用ラッパーhtmlを追加
            var cartjs_stock = cartjs_box.find('.cartjs_stock td');
            cartjs_stock.wrapInner('<span class="stock_wrapper"></span>');

            // SP時の購入ボタン色変更
            var cartjs_btn = cartjs_box.find('.cartjs_btn');
            var add_style = `
                background-color: #fbdf15;
                background-image: none;
                color: #777;
                border: none;
                box-shadow: none;
            `;

            cartjs_btn_style_attr = cartjs_btn.attr('style');
            cartjs_btn.attr('style', cartjs_btn_style_attr + add_style);

            // 在庫切れ時の対応
            var cart_in_button_class_name = ( ua.match(/Mobile/) && !ua.match(/iPad/)) ? '.cartjs_buy' : '.cartjs_cart_in';
            if( cartjs_box.find(cart_in_button_class_name).length == 0 ) {
                $(this).find('.cartjs_box').empty();
                $(this).find('.cartjs_box').append('<p style="text-align: center; margin-bottom: 20px;">現在在庫はありません</p>');
            };


        });

        // モバイル時不要なスタイルの削除
        if ( ua.match(/Mobile/) && !ua.match(/iPad/)) {
            // SP
            $('.cartjs_description').removeAttr('style');
            $('.cartjs_header').removeAttr('style');
            $('.cartjs_box').removeAttr('style');
        }


    });

});

