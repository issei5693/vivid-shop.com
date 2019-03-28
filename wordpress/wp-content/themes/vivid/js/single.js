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
        
        // 画像URLの差し替え
        var target_item_img_elm = ( ua.match(/Mobile/) && !ua.match(/iPad/)) ? '#swipe_image' : '.cartjs_product_img img';
        var item_img_url = cartjs_box.find(target_item_img_elm).attr('src');
        single_item.find('.scji-item-img').attr('src', item_img_url);
        cartjs_box.find(target_item_img_elm ).remove();

        // 商品名の差し替え
        var target_item_name_elm = ( ua.match(/Mobile/) && !ua.match(/iPad/)) ? 'h2' : '.cartjs_product_name';
        var item_name = cartjs_box.find(target_item_name_elm).text();
        single_item.find('.scji-item-name').text(item_name);
        cartjs_box.find(target_item_name_elm).remove();
        
        // 販売価格の差し替え
        var item_selling_price = cartjs_box.find('.cartjs_sales_price td').text();
        single_item.find('.scji-item-price').text(item_selling_price);
        cartjs_box.find('.cartjs_sales_price').remove();

        // 商品詳細の挿入
        if ( ua.match(/Mobile/) && !ua.match(/iPad/)) {
            // SP
            cartjs_box.find('.cartjs_description').insertBefore(cartjs_box).wrapInner('<p />');
        }

        // Off率の挿入
        var int_list_price      = single_item.find('s').text().replace(/[^0-9]/g, '');
        var int_selling_price   = item_selling_price.replace(/[^0-9]/g, '');
        var off_per             = Math.floor( (int_list_price - int_selling_price)/int_list_price * 100 );
        if( int_list_price == 0) off_per = 0;
        single_item.find('.scji-item-off').text(off_per +'%OFF');

        // scriptカートへCSSへCSSを適用
        cartjs_box.addClass('p-single-cartjs-box');

        // 不要なスタイルの削除
        if ( ua.match(/Mobile/) && !ua.match(/iPad/)) {
            // SP
            $('.cartjs_description').removeAttr('style');
            $('.cartjs_header').removeAttr('style');
            $('.cartjs_box').removeAttr('style');
        }

    });

});