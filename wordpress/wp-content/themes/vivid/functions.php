<?php

/**
 * スクリプトファイルの実行順
 *
 * @return void
 */

/**
 * gutenbergの使用停止
 */
add_filter('use_block_editor_for_post_type', 'disable_gutenberg', 10, 2);

function heresy_scripts(){

    // 標準jQueryの読み込み( $handle, $src, $deps, $ver, $in_footer )
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'swiper-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js','jquery','4.4.6','true');
    wp_enqueue_script( 'script', get_template_directory_uri().'/js/script.js','jquery','','true');

    // wp_enqueue_styel( 'スクリプトの識別名（ハンドル）', スクリプトのURL, 依存スクリプトの識別名, バージョン文字列, 読み込み場所 );
    wp_enqueue_style( 'style', get_stylesheet_uri(), '', '1.0.0', 'all' );
    wp_enqueue_style( 'gnavctr', get_template_directory_uri().'/css/gnavctr.css', '', '1.0.0', 'all' );
    wp_enqueue_style( 'dynamic-search-area', get_template_directory_uri().'/css/dynamic-search-area.css', '', '1.0.0', 'all' );
    wp_enqueue_style( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.min.css', '', '4.4.6', 'all' );
    
}
add_action( 'wp_enqueue_scripts', 'heresy_scripts' );

/**
 * サムネイルの有効化
 */
$args = array(
    'post',
);
add_theme_support( 'post-thumbnails', $args );

/**
 * aoutpの削除
 */
remove_filter('term_description','wpautop');
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

/**
 * ウィジットエリアの追加
 */
register_sidebar(array(
    'name' => '新着情報' ,
    'id' => 'news' ,
    'description' => '新着情報をHTMLで編集します。',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => ''
));

/**
 * ウィジットタイトルの無効化
 */
function remove_widget_title_all( $widget_title ) {
    return;
}
add_filter( 'widget_title', 'remove_widget_title_all' );

/**
 * 指定のカテゴリIDの中の投稿に付与されているタグを件数付きで返却する
 */
function get_post_added_tags( $cat_id ) {
    
    $args = array(
        'post_type'         => 'post',
        'post_status'       => 'publish',
        'posts_per_page'    => -1,
        'cat'               => $cat_id,
    );

    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) :
        while ($the_query->have_posts()) : $the_query->the_post();
            $post_ids[] = get_the_ID();
        endwhile;
    endif;
    wp_reset_postdata();

    $tags = wp_get_object_terms( $post_ids, 'post_tag');

    foreach($tags as $tag){
        $args = array(
            'post_type'         => 'post',
            'post_status'       => 'publish',
            'posts_per_page'    => -1,
            'cat'               => $cat_id,
            'tag_id'            => $tag->term_id,
        );
    
        $the_query = new WP_Query($args);
        
        $tag->{'cat_added_count'} = $the_query->found_posts;
        $new_tags[] = $tag;

        wp_reset_postdata();
    };

    return $new_tags;

}

/**
 * WP_Query用カスタムページャー
 *
 * @param [type] $the_query
 * @param integer $number_display
 * @return void
 */
function get_wp_query_pagenation( $the_query, $number_display=5 ){

    // 使用する変数のグローバル化
    global $paged;          // 現在のページ数
    global $posts_per_page; // 一件あたりの表示件数(管理画面から設定したもの)
    global $cat;            // カテゴリページ用
    global $tag_id;         // tagページ用

    // パラメータ付きのURLの場合最後にパラメータを付与しなおす
    $request_uri = $_SERVER["REQUEST_URI"];
    preg_match('/\?(.*?)$/',$request_uri, $matches)[0];

    $uri_param = $matches[0];

    // ベースURLの設定(ページャーの発生する可能性のあるページ)
    $url = home_url();

    if( is_category() ){
        $url = get_category_link($cat);
    } else if( is_tag() ){
        $url = get_term_link($tag_id);
    } else if( is_author() ){
        $url = rtrim(get_author_posts_url($GLOBALS['author']), '/');
    }

    if( mb_substr($url, -1) != '/'){ // ベースURLにトレイリングスラッシュを追加
        $url .= '/';
    }


    $wp_query           =   $the_query;
    $posts_count        =   $wp_query->found_posts; // 投稿の件数
    $page_num           =   ceil( $posts_count / $posts_per_page ); // 総ページ数
    $number_display     =   $number_display >= $page_num ? $page_num : $number_display; // 表示するナビゲーションの数->ページ数を超過している場合は最大ページ数を入れる

    //%1\$s => p-pagenation__itemのクラス ex. p-pagenation__item or p-pagenation__item--nb
    //%2\$s => 内容タグの種類、 ex. a or span
    //%3\$s => tileのクラス ex. c-tile c-tile--nh
    //%4\$s => URL 'href=""'のようにhrefの文言も含める
    //%5\$s => 文言
    $list = "<li class='%1\$s'><%2\$s class='%3\$s' %4\$s>%5\$s</%2\$s></li>";

    $num_list = function() use($list, $page_num, $paged, $number_display, $url, $uri_param ){
        if($paged <= ceil($number_display/2)){                  // 現在のページがページャ表示の中心より左の場合
            $start_num  =   1;
            $end_num    =   $number_display;

        } else if($paged > $page_num-ceil($number_display/2)){  // 現在のページがページャ表示の中心を超えて右の場合
            $start_num  =   $page_num-$number_display+1;
            $end_num    =   $page_num;

        } else {                                                // 現在のページがページャ表示の中心に収まる範囲内
            $start_num  =   $paged-(floor($number_display/2));
            $end_num    =   $paged+(floor($number_display/2));

        }

        $num_list = ''; // ラムダとは別の内部スコープ変数

        // ページャに表示される数字が1から始まらないときは「...」を出力する
        if( $start_num != 1) $num_list .= sprintf($list,'p-pagenation__item','span','','','...');

        for( $i=$start_num; $i<=$end_num; $i++){

            if( ($paged==0 && $i==1) || ($paged == $i) ) {
                // 出力する番号が現在表示中のページの場合
                $num_list .= sprintf($list,'p-pagenation__item','span','p-pagenation__active','',$i);
            } else {
                // 出力する番号が現在表示中でないページの場合
                $num_list .= ($i == 1) ?
                    // 1ページ目を出力するときは「page/」の表記はいらない
                    sprintf($list,
                        'p-pagenation__item', // liに付与するクラス
                        'a',
                        'p-pagenation__link',
                        'href="'. $url . $uri_param .'"',
                        $i
                    ) :
                    sprintf($list,
                        'p-pagenation__item',
                        'a',
                        'p-pagenation__link',
                        'href="'. $url . 'page/' . $i .'/' . $uri_param . '"',
                        $i
                    );
            }

        }

        // 最後の表示数が出力されない場合は「...」を出力
        if( $end_num != $page_num){
            $num_list .= sprintf($list,'p-pagenation__item','span','','','...');
        }

        return $num_list;
    };

    // <ul>でネスト
    $pagenation = sprintf('<ul class="p-pagenation">%s</ul>',$num_list());

    return $pagenation;

}

/**
 * 
 */
function get_display_post_number($wp_query){

    global $paged;
    global $posts_per_page;
    $paged = get_query_var('paged')? get_query_var('paged') : 1;

    $start_num = '';
    $end_num   = '';

    if($paged == 1){
        $start_num = 1;   
    } else {
        $start_num = ($paged-1) * $posts_per_page + 1;
    }

    $end_num = $start_num + $wp_query->post_count -1;

    return $start_num . '〜' . $end_num;

}