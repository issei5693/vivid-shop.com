<?php

/**
 * スクリプトファイルの実行順
 *
 * @return void
 */
function heresy_scripts(){

    // 標準jQueryの読み込み( $handle, $src, $deps, $ver, $in_footer )
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'swiper-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js','','','true');
    // wp_enqueue_script( 'swiper-cdn-map', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js.map','','','true');
    wp_enqueue_script( 'script', get_template_directory_uri().'/js/script.js','','','true');

    // wp_enqueue_styel( 'スクリプトの識別名（ハンドル）', スクリプトのURL, 依存スクリプトの識別名, バージョン文字列, 読み込み場所 );
    wp_enqueue_style( 'style', get_stylesheet_uri(), '', '1.0.0', 'all' );
    wp_enqueue_style( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.css', '', '4.4.6', 'all' );
    
}
add_action( 'wp_enqueue_scripts', 'heresy_scripts' );

/**
 * サムネイルの有効化
 */
$args = array(
    'post',
);
add_theme_support( 'post-thumbnails', $args );
