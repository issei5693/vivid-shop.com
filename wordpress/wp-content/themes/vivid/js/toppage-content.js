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
    $('.sortable-item-remove').on('click', function(){
        $(this).parents('.sortable-item').remove();
    });

    // 追加ボタン処理
    $('#add_item').on('click', function(){
        var last_item = $('.sortable-item')[$('.sortable-item').length-1];
        var cloned_item = $(last_item ).clone();

        // クローンしたアイテムを色々変更
        cloned_item.find('input').val($('.sortable-item').length+1);
        cloned_item.find('.order-number').text($('.sortable-item').length+1);

        $('#sortableArea').append(cloned_item);
    });
});
