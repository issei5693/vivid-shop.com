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
    add_action('admin_print_scripts-'.$top_page_content_recommend, 'admin_toppage_content_script');
    add_action('admin_print_scripts-'.$top_page_content_runking, 'admin_toppage_content_script');

}
add_action('admin_menu', 'top_page_content_settings_menu');

// ページごとに使用するスクリプトの読み込み
function admin_toppage_content_script(){
    wp_enqueue_script( 'jquery-ui', get_template_directory_uri().'/js/jquery-ui.min.js','jquery','1.12.0','true');
    wp_enqueue_script( 'toppage-content', get_template_directory_uri().'/js/toppage-content.js','jquery-ui','','true');
}

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


