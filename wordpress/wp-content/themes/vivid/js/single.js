var breakpoint = 736;
var ua = navigator.userAgent; 

/**
 * jQuery
 * 
 */
jQuery(function($){

    //single item controll
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

        // 商品詳細の挿入
        if ( ua.match(/Mobile/) && !ua.match(/iPad/)) {
            // SP
            item_box.find('.cartjs_description').insertBefore('#singleCartJsItem').wrapInner('<p />');
        }

        // Off率の挿入
        var int_list_price      = $('.p-item__info s').text().replace(/[^0-9]/g, '');
        var int_selling_price   = selling_price.replace(/[^0-9]/g, '');
        var off_per             = (int_list_price - int_selling_price)/int_list_price * 100;
        if( int_list_price == 0) off_per = 0;
        $('.js-selling-price .p-item__info-data').append('<span>'+ off_per +'%OFF</span>');

        // 不要なスタイルの削除
        if ( ua.match(/Mobile/) && !ua.match(/iPad/)) {
            $('.cartjs_description').removeAttr('style');
            $('.cartjs_header').removeAttr('style');
            $('.cartjs_box').removeAttr('style');
        }

    });

});