<?php 
/***
 * トップページコンテンツ
 * 
 */
//メニューの表示設定
function top_page_content_settings_menu() {
    $top_page_content_top = add_menu_page(
        'トップページコンテンツの編集',        // 第1引数: <title></title>に表示される内容
        'トップページコンテンツ',             // 第2引数: 左のメニューバーに出力される項目
        'manage_options',                 // 第3引数: 管理権限(ふつうはmanage_oprionsでいいと思います)
        'top_page_settings',              // 第4引数: スラッグ
        'top_page_settings_page',         // 第5引数: メニューページ読み込み時に実行される関数。includeで別ファイルを呼び出して、viewのように使える
        '',                               // 第6引数: アイコンURL
        25                                // 第7引数: ポジション
    );

    $top_page_content_whole = add_submenu_page(
        'top_page_settings',              // 第1引数: 親メニューのスラッグ名
        '全般',                            // 第2引数: サブメニューページのタイトル
        '全般',                            // 第3引数: プルダウンに表示されるメニュー名
        'manage_options',                 // 第4引数: 管理権限(ふつうはmanage_oprionsでいいと思います)
        'top_page_settings',              // 第5引数: サブメニューのスラッグ
        ''                                // 第6引数: コールバック関数
    );

    $top_page_content_recommend = add_submenu_page(
        'top_page_settings', 
        'おすすめ商品',
        'おすすめ商品',
        'manage_options',
        'recommend_settings',
        'recommend_settings_page'
    );

    $top_page_content_runking = add_submenu_page(
        'top_page_settings',
        'ランキング',
        'ランキング',
        'manage_options',
        'ranking_settings',
        'ranking_settings_page'
    );

    // 読み込みスクリプト制御
    add_action('admin_print_scripts-'.$top_page_content_recommend, 'admin_toppage_content_script'); // おすすめコンテンツページでのスクリプト出力時
    add_action('admin_print_scripts-'.$top_page_content_runking, 'admin_toppage_content_script'); // ランキングページでのスクリプト出力時

    // 読み込みCSSの制御
    add_action("admin_head-".$top_page_content_recommend, "admin_toppage_content_script"); // おすすめコンテンツページでのcss出力時
    add_action("admin_head-".$top_page_content_runking, "admin_toppage_content_script"); // ランキングページでのcss出力時


}
add_action('admin_menu', 'top_page_content_settings_menu');

// ページごとに使用するcssとスクリプトの読み込み
// 参考: https://qiita.com/kouichi_hoshi/items/89fed246fee9947678ed
function admin_toppage_content_script(){
    // js
    wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/js/jquery-ui.min.js','jquery','1.12.0','true');
    wp_enqueue_script( 'toppage-content', get_template_directory_uri().'/js/toppage-content.js','jquery-ui','','true');
    wp_localize_script('toppage-content', 'toppage_content_vars', array('ajax_url' => admin_url('admin-ajax.php'))); // ajax用のパスを渡す

    // css
    wp_enqueue_style( 'recommend-style', get_template_directory_uri().'/css/recommend-style.css' );
    wp_enqueue_style( 'ranking-style', get_template_directory_uri().'/css/ranking-style.css' );
    
}
add_action( 'wp_enqueue_scripts', 'admin_toppage_content_script' );



// ビューの呼び出し
// 全般のViewの設定
function top_page_settings_page() {
    include 'views/toppage-content.php';
}

// 「おすすめ商品」Viewの設定
function recommend_settings_page() {
    include 'views/recommend.php';
}
// 「ランキング」Viewの設定
function ranking_settings_page() {
    include 'views/ranking.php';
}

// 選択商品のajax処理
function get_item(){
    $post_id = $_POST['post_id'];

    $post_thunbnail_url = get_the_post_thumbnail_url($post_id,'full') ? 
        get_the_post_thumbnail_url($post_id,'full') : 
        get_template_directory_uri().'/img/ni_item-thumbnail.png';
    $post_title         = get_the_title($post_id);
    $category_name      = get_the_category($post_id)[0]->name;

    $item_html = <<< EOM
<li class="sortable-item">
    <div class="sortable-item-header">
        <ul class="sortable-item-header-list">
            <li>
                <span class="sortable-item-header-nav-list-item">
                    表示順:<span class="order-number"><?php the_field('recommend_order'); ?></span>
                </span>
            </li>
            <li>
                <span class="sortable-item-header-nav-list-item sortable-item-remove">削除</span>
            </li>
        </ul>
    </div>
    <div class="sortable-item-inner-wrapper">
        <figure class="sortable-item-content-thunbnail">
            <img src="{$post_thunbnail_url}" alt="{$post_title}">
        </figure>
        <div class="sortable-item-content">
            <h3 class="sortable-item-title">
                <span class="sortable-item-content-section">{$category_name}</span>
                <span class="sortable-item-content-section">{$post_title}</span>
            </h3>
            <p>
                <span>30% OFF</span>
                <span>¥10,000円</span>
                <s>¥15,000円</s>
            </p>
        </div>
    </div>
    <input type='hidden' name="post_ids[]" value="{$post_id}">
</li>

EOM;
    echo $item_html;
    die(); // これがないと0が返却される


}
add_action('wp_ajax_get_item', 'get_item');
 


/**
 * カスタムフィールド の更新処理
 */
// 「更新」ボタンが押されてPOSTされたデータかどうかをnonceで判断
// @to do optionテーブルを利用してnonce値を登録し、セキュリティをあげる。
$nonce = $_POST['nonce'];
$page_param = $_GET['page'];
if( $nonce == 'my-nonce' && $page_param == 'recommend_settings'){

    // 「更新」ボタンで送られてきたpostの値の取得(本来バリデーションは必須だが、管理画面なのでバリデーションは省略)
    $update_post_ids = $_POST['post_ids']; // null or array

    // WP_queryから投稿IDのみ抽出
    $args = array(
        'post_type'         => 'post', 
        'meta_key'          => 'recommend_order',
        'meta_value'        => '0',
        'meta_compare'      => '>=',
        'orderby'           => 'meta_value_num',
        'order'             => 'ASC',
        'posts_per_page'    => -1,
        'no_found_rows'     => true,  //ページャーを使う時はfalseに。
    );
    $the_query = new WP_Query($args);
    $reset_post_ids = [];
    if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
        $reset_post_ids[] = get_the_ID();
    endwhile; endif;
    
    // おすすめ商品を全てリセット
    foreach($reset_post_ids as $reset_post_id){
        update_post_meta( $reset_post_id, 'recommend_order', '');
    }

    // POSTされたおすすめ商品をアップデート
    foreach($update_post_ids as $key => $update_post_id){
        update_post_meta( $update_post_id, 'recommend_order', $key+1);
    }

    // 同じページにメッセージ付きでリダイレクト
    // header("Location: " . $_SERVER['PHP_SELF'] . '?page=recommend_settings&message=1');
    wp_redirect( '?page=recommend_settings&message=1' );
    exit();
}


// フィールドの作成(今回は同じページにアクセスさせて投稿のメタデータのアップデータを行うだけなのでフィールドは必要なし)
// function top_page_content_settings() {
//     $columns = array(
//         'post_id',
//         'order'
//     );
//     // おすすめコンテンツのフィールド
//     foreach($columns as $colum){
//         register_setting( 
//             'recommend_settings',       // 第1引数: 設定のグループ名。つまりadd_options_pageで追加されたページのページid。view側で呼び出すsettings_fields()の引数と一致させる。
//             $column,                    // 第2引数: 無害化して保存するオプションの名前。つまりDBのカラム名。
//             ''                          // 第3引数: 第2引数の値を無害化する際に使用するコールバック関数。2回通される。
//         );
//     }


// }
// add_action( 'admin_init', 'top_page_content_settings' );


