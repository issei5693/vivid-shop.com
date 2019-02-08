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
