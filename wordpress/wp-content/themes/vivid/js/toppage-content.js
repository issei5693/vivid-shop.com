jQuery(function($){
    // sortableで並び替えた時のvalue変更処理
    function itemRenumber(){
        $('.sortable-item').each(function(index, element){
            $(element).find('input').val(index+1);
            $(element).find('.order-number').text(index+1);
        });
    }

    $("#sortableArea").sortable({
        update: function(){
            itemRenumber();
        }
    });
    // 削除ボタン処理
    $(document).on('click', '.sortable-item-remove', function(){
        console.log('click');
        $(this).parents('.sortable-item').remove();
        itemRenumber();
    });

    // 追加ボタン処理
    $('#add_item').on('click', function(){
        var sortable_item = $('.sortable-item');

        if(sortable_item.length == 0 ){
            var new_sortable_item = [
                '<li class="p-item-list__item sortable-item ui-sortable-handle" style="width: 60%; border: solid 1px #ccc; border-radius: 5px; padding: 5px; margin-right: 5px; background-color: #fff;">',
                    '<p>表示順:<span class="order-number">1</span></p>',
                    '<p><span class="sortable-item-remove">削除</span></p>',
                    '<div class="c-lisence-card">',
                        '<span class="c-lisence-card__link" style="display: flex;">',
                            '<figure class="c-lisence-card__image">',
                                '<img class="c-lisence-card__img" src="http://localhost/wp-content/themes/vivid/img/ni_item-thumbnail.png" alt="デイリープロテクションベース">',
                            '</figure>',
                            '<h3 class="c-lisence-card__title">',
                                '<span class="c-lisence-card__section">メーカー名</span>',
                                '<span class="c-lisence-card__section">商品タイトル</span>',
                            '</h3>',
                            '<p class="c-lisence-card__content">',
                                '<span class="c-lisence-card__section">30% OFF</span>',
                                '<span class="c-lisence-card__price">¥10,000円</span>',
                                '<s>¥15,000円</s>',
                            '</p>',
                        '</span>',
                    '</div>',
                    '<input type="hidden" name="" value="1">',
                '</li>'
            ].join("");

            $('#sortableArea').append(new_sortable_item);
        } else {
            var last_item = sortable_item[sortable_item.length-1];
            var cloned_item = $(last_item).clone();

            // クローンしたアイテムを色々変更
            cloned_item.find('input').val($('.sortable-item').length+1);
            cloned_item.find('.order-number').text($('.sortable-item').length+1);

            $('#sortableArea').append(cloned_item);
        }

        itemRenumber();
        
    });
});
