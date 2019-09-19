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

        // 不要なスタイルの削除
        if ( ua.match(/Mobile/) && !ua.match(/iPad/)) {
            // SP
            $('.cartjs_description').removeAttr('style');
            $('.cartjs_header').removeAttr('style');
            $('.cartjs_box').removeAttr('style');
        }

        // 在庫切れ時の対応
            var cart_in_button_class_name = ( ua.match(/Mobile/) && !ua.match(/iPad/)) ? '.cartjs_buy' : '.cartjs_cart_in';
            if( !cartjs_box.find(cart_in_button_class_name).length ) {
                $(this).find('.cartjs_box').empty();
                $(this).find('.cartjs_box').append('<p style="text-align: center;">現在在庫はありません</p>');
            };

        // 在庫切れ時の対応
        var cart_in_button_class_name = ( ua.match(/Mobile/) && !ua.match(/iPad/)) ? '.cartjs_buy' : '.cartjs_cart_in';
        var item_description_class_name = ( ua.match(/Mobile/) && !ua.match(/iPad/)) ? '.cartjs_header' : '.cartjs_product_explain';
        if( cartjs_box.find(cart_in_button_class_name).length == 0 ) {
            cartjs_box.find(item_description_class_name).after('<p style="text-align: center; margin: 20px 0;">現在在庫はありません</p>');
        };

    });

});