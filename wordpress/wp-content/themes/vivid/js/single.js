var breakpoint = 736;
var ua = navigator.userAgent; 

/**
 * jQuery
 * 
 */
jQuery(function($){

    //single item controll
    $(window).on('load', function(){
        var single_item = $('.single-cart-js-item');
        var cartjs_box = single_item.find('.cartjs_box');
        
        //item_box.addClass('p-cartjs-box');

        // 画像URLの差し替え
        var item_img_url = cartjs_box.find('img').attr('src');
        single_item.find('.p-item__img').attr('src', item_img_url);
        cartjs_box.find('.cartjs_product_img img').remove();
        
        // 商品名の差し替え
        if ( ua.match(/Mobile/) && !ua.match(/iPad/)) {
            // SP
            var item_name = cartjs_box.find('h2').text();
            cartjs_box.find('h2').remove();
        } else {
            // PC(iPad)
            var item_name = cartjs_box.find('.cartjs_product_name').text();
            cartjs_box.find('.cartjs_product_name').remove();
        }
        single_item.find('.p-item__title').text(item_name);
        
        // 販売価格の差し替え
        var item_selling_price = cartjs_box.find('.cartjs_sales_price td').text();
        single_item.find('.js-selling-price').text(item_selling_price);
        cartjs_box.find('.cartjs_sales_price').remove();

        // 商品詳細の挿入
        if ( ua.match(/Mobile/) && !ua.match(/iPad/)) {
            // SP
            cartjs_box.find('.cartjs_description').insertBefore(cartjs_box).wrapInner('<p />');
        }

        // Off率の挿入
        var int_list_price      = single_item.find('s').text().replace(/[^0-9]/g, '');
        var int_selling_price   = item_selling_price.replace(/[^0-9]/g, '');
        var off_per             = (int_list_price - int_selling_price)/int_list_price * 100;
        if( int_list_price == 0) off_per = 0;
        single_item.find('.js-selling-price').append('<span>'+ off_per +'%OFF</span>');

        // scriptカートへCSSへCSSを適用
        cartjs_box.addClass('p-cartjs-box');

        // 不要なスタイルの削除
        if ( ua.match(/Mobile/) && !ua.match(/iPad/)) {
            // SP
            $('.cartjs_description').removeAttr('style');
            $('.cartjs_header').removeAttr('style');
            $('.cartjs_box').removeAttr('style');
        }

    });

});