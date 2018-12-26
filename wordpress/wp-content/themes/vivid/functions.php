<?php

/**
 * スクリプトファイルの実行順
 *
 * @return void
 */
function heresy_scripts(){

    // 標準jQueryの読み込み
    wp_enqueue_script( 'jquery');

    // wp_enqueue_styel( 'スクリプトの識別名（ハンドル）', スクリプトのURL, 依存スクリプトの識別名, バージョン文字列, 読み込み場所 );
    wp_enqueue_style( 'style', get_stylesheet_uri(), '', '1.0.0', 'all' );
    
}
add_action( 'wp_enqueue_scripts', 'heresy_scripts' );

/**
 * サムネイルの有効化
 */
$args = array(
    'post',
);
add_theme_support( 'post-thumbnails', $args );
