jQuery(function($){
    
    // 採番処理
    function itemRenumber(){
        $('.sortable-item').each(function(index, element){
            $(element).find('.order-number').text(index+1);
        });
    }

    /***
     * sortableで並び替えた時の採番処理
     */
    $("#sortableArea").sortable({
        update: function(){
            itemRenumber();
        }
    });

    /***
     * 削除ボタン処理
     */
    $(document).on('click', '.sortable-item-remove', function(){
        console.log('click');
        $(this).parents('.sortable-item').remove();
        itemRenumber();
    });

    /***
     * 追加ボタン処理
     */
    $('#add_item').on('click', function(){

        // 選択されたidの取得
        var selected_post_id = $('#add-item').val();

        if(selected_post_id == ''){
            alert('商品を選択してください');
        } else {
            // ajax処理: get_item(toppage-content.php)で情報を取得してくる
            getItem(selected_post_id);
        }

    });
    

    /***
     * ajax処理: getItem 
     * */ 
    
    function getItem(post_id){
        console.log('URLは'+toppage_content_vars.ajax_url);
        $.ajax({
            type: "POST",
            url: toppage_content_vars.ajax_url,
            dataType: 'html',
            data: {
                action: 'get_item',
                post_id: post_id,
                check_nonce: toppage_content_vars.check_nonce
            }
        }).done(function(data, textStatus, jpXHR){
            // console.log('textStatusは'+textStatus);
            // console.log('jpXHRは'+jpXHR);
            // console.log(data);
            
            // 取得したアイテムの追加
            $('#sortableArea').append(data);

            // 採番のやり直し
            itemRenumber();
            
        }).fail(function(XMLHttpRequest, textStatus, errorThrown){
            console.log('ajax取得エラーです');
            console.log("XMLHttpRequest : " + XMLHttpRequest.status);
            console.log("textStatus     : " + textStatus);
            console.log("errorThrown    : " + errorThrown.message);
        });
    }
});
