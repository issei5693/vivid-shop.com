<?php
// エラー出力の制御
// ini_set('display_errors', "On");

/**
 * スクリプトファイルの実行順
 *
 * @return void
 */

/**
 * gutenbergの使用停止
 */
add_filter('use_block_editor_for_post_type', 'disable_gutenberg', 10, 2);

/**
 * 表示側のスクリプトファイルの読み込み順
 */
function vivid_scripts(){
    // スクリプトの登録( $handle, $src, $deps, $ver, $in_footer )
    wp_register_script('swiper-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js', array('jquery'), '4.4.6','true');
    wp_register_script('my-swiper', get_template_directory_uri().'/js/my-swiper.js',array('swiper-cdn'),'','true');
    wp_register_script('script', get_template_directory_uri().'/js/script.js',array('jquery'),'','true');
    wp_register_script('single', get_template_directory_uri().'/js/single.js',array('jquery'),'','true');

    
    wp_enqueue_script('script'); // 共通読み込み

    if(is_home()|| is_front_page()){ 
        // トップページのみ読み込み
        wp_enqueue_script( 'swiper-cdn'); // swiper関連
        wp_enqueue_script( 'my-swiper');  // swiper関連

    } elseif(is_single()){
        // シングルページのみ読み込み
        wp_enqueue_script( 'single');
    }

    // wp_enqueue_styel( 'スクリプトの識別名（ハンドル）', スクリプトのURL, 依存スクリプトの識別名, バージョン文字列, 読み込み場所 );
    wp_enqueue_style( 'style', get_stylesheet_uri(), '', '1.0.0', 'all' );
    wp_enqueue_style( 'gnavctr', get_template_directory_uri().'/css/gnavctr.css', '', '1.0.0', 'all' );
    wp_enqueue_style( 'dynamic-search-area', get_template_directory_uri().'/css/dynamic-search-area.css', '', '1.0.0', 'all' );
    wp_enqueue_style( 'swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.min.css', '', '4.4.6', 'all' );
    
}
add_action( 'wp_enqueue_scripts', 'vivid_scripts' );


/***
 * Plugin name: Hook Suffix Console
 * サフィックスをコンソールに出力する
 * 参考: https://firegoby.jp/archives/2236
*/
// add_action("admin_head", 'suffix2console');
// function suffix2console() {
//     global $hook_suffix;
//     if (is_user_logged_in()) {
//         $str = "<script type=\"text/javascript\">console.log('%s')</script>";
//         printf($str, $hook_suffix);
//     }   
// }


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

// 新着情報
register_sidebar(array(
    'name' => '新着情報' ,
    'id' => 'news' ,
    'description' => '新着情報をHTMLで編集します。',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => ''
));

// スライダー
register_sidebar(array(
    'name' => 'スライダー' ,
    'id' => 'slider' ,
    'description' => 'スライダー画像を設定します。',
    'before_widget' => '<li class="swiper-slide">',
    'after_widget' => '</li>',
    'before_title' => '',
    'after_title' => ''
));

// トップページサブバナー(2箇所)
register_sidebar(array(
    'name' => 'トップページサブバナー' ,
    'id' => 'top_page_sub_banner' ,
    'description' => 'トップページサブバナーの画像を設定します。',
    'before_widget' => '<li class="p-top-page-sub-banner-list__item">',
    'after_widget' => '</li>',
    'before_title' => '',
    'after_title' => ''
));

// トップテキストエリア
register_sidebar(array(
    'name' => 'トップページテキスト' ,
    'id' => 'top_page_text_area' ,
    'description' => 'トップページのテキストエリアを編集します',
    'before_widget' => '<div class="l-main__content-primary-fifth"><div class="p-top-page-text-area">',
    'after_widget' => '</div></div>',
    'before_title' => '',
    'after_title' => ''
));

// トップページフッターバナー'
register_sidebar(array(
    'name' => 'フッターバナー' ,
    'id' => 'top_page_footer_banner' ,
    'description' => 'トップページフッターバナーの画像を設定します。',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => ''
));

// サイドバナー
register_sidebar(array(
    'name' => 'サイドバナー' ,
    'id' => 'side_banner' ,
    'description' => 'サイドバナーの画像を設定します。',
    'before_widget' => '<li class="p-sidebar-banner-list__item">',
    'after_widget' => '</li>',
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

    global $category;
    
    $cat_id = $category->parent == 0 ? $category->term_id : $category->parent;

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

        for($i=$start_num; $i<=$end_num; $i++){

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
 * 取得件数と表示件数の表示
 */
function get_display_post_number($wp_query){

    // 一件も取得できていない場合は「0件」
    if ($wp_query->found_posts == 0) return 0;

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

/**
 * 親カテゴリの再帰取得
 *
 * @param [type] $category_id
 * @param array $cat_hierarchies
 * @return void
 */
function get_the_category_hierarchy($category_id, $cat_hierarchies=[]) {
    $cat_object = get_category($category_id);
    $cat_hierarchies[] = $cat_object;

    if($cat_object->parent){
        $cat_hierarchies = get_the_category_hierarchy($cat_object->parent, $cat_hierarchies);
    }

    return $cat_hierarchies;

}

/**
 * パンクズ出力
 * @todo 分岐が多くなってきたのでcase分に変更
 */
function get_the_breadcrumb(){

    $home_tag = '<li class="p-breadcrumb-list__item"><a class="p-breadcrumb-list__link" href="'.home_url().'">' . 'TOP' . '</a></li>';

    $outer_tag =
    '<div class="p-breadcrumb">
        <ul class="p-breadcrumb-list">
            %s
        </ul>
    </div>';

    $link_li = '<li class="p-breadcrumb-list__item"><a class="p-breadcrumb-list__link" href="%s">%s</a></li>';

    $span_li = '<li class="p-breadcrumb-list__item"><span>%s</span></li>';

    $tag = '';
    if(is_home()||is_front_page()){
        return false;

    } elseif(is_category()) {
        global $cat;
        $category_hierarchies = array_reverse(get_the_category_hierarchy($cat));


        foreach($category_hierarchies as $key=>$category_hierarchy){
            $tag .= $key == (count($category_hierarchies)-1) ?
                sprintf($span_li, $category_hierarchy->name) :
                sprintf($link_li, get_category_link($category_hierarchy->term_id), $category_hierarchy->name);
        }

        return sprintf($outer_tag, $home_tag.$tag);

    }  elseif(is_tag()) {
        global $tag_id;
        $tag .= sprintf($span_li, get_term($tag_id)->name);

        return sprintf($outer_tag, $home_tag.$tag);

    } elseif(is_post_type_archive()){
        $tag .= sprintf($span_li, post_type_archive_title('',false));
        return sprintf($outer_tag, $home_tag.$tag);

    } elseif(is_singular( ['dictionary'] )){
        $tag .= sprintf($link_li, get_post_type_archive_link(get_post_type()), get_post_type_object(get_post_type())->labels->name);
        $tag .= sprintf($span_li, get_the_title());
        return sprintf($outer_tag, $home_tag.$tag);

    } elseif(is_single()){
        $category = get_the_category();
        $category_hierarchies = array_reverse(get_the_category_hierarchy($category[count($category)-1]->term_id));
        foreach($category_hierarchies as $key=>$category_hierarchy){
            $tag .= sprintf($link_li, get_category_link($category_hierarchy->term_id), $category_hierarchy->name);
        }

        $tag .= sprintf($span_li, get_the_title());
        return sprintf($outer_tag, $home_tag.$tag);

    } elseif(is_page()){
        $tag .= sprintf($span_li, get_the_title());
        return sprintf($outer_tag, $home_tag.$tag);

    } elseif(is_search()){
        $tag .= sprintf($span_li,'検索結果');
        return sprintf($outer_tag, $home_tag.$tag);

    } elseif(is_author()){
        $tag .= sprintf($link_li, get_permalink(get_page_by_path('authors')->ID), get_the_title(get_page_by_path('authors')->ID));
        $tag .= sprintf($span_li, get_userdata($GLOBALS['author'])->display_name);
        return sprintf($outer_tag, $home_tag.$tag);

    } elseif(is_404()){
        $tag .= sprintf($span_li,'404');
        return sprintf($outer_tag, $home_tag.$tag);

    } else {
        return '<p style="display:none;">パンクズ出力想定外のページです。必要であればfunctions.phpを編集してください。</p>';
    }
}

/**
 * 構造化データパンクズ
 *
 * @return void
 */
function get_json_ld_breadcrumb() {

    $schema_url = 'http://schema.org/';

    $breabcrumb_data = array(
        '@context'          =>   $schema_url,
        '@type'             =>   'BreadcrumbList',
        'itemListElement'   =>   '',
    );

    $ListItem = function( $position, $id='', $name){
        return array(
            '@type'     =>  'ListItem',
            'position'  =>  $position, // 1
            'item'      => array(
                    '@id'   =>  $id, // 'http://ecotopia.earth'
                    'name'  =>  $name // エコトピア
            )
        );
    };

    $itemListElements = array(
        $ListItem(1, home_url(), get_bloginfo('name'))
    );

    if(is_home() || is_front_page()){
        //

    } else if(is_page()){
        $itemListElements[] = $ListItem(2, get_the_permalink(), get_the_title());

    } else if(is_category()){
        global $cat;
        $position_counter = 2;

        $category_hierarchies = array_reverse(get_the_category_hierarchy($cat));
        foreach($category_hierarchies as $category_hierarchy){
            $itemListElements[] = $ListItem($position_counter, get_category_link($category_hierarchy->term_id), $category_hierarchy->name);
            $position_counter++;
        }

    } elseif(is_post_type_archive()){
        $position_counter = 2;
        $itemListElements[] = $ListItem($position_counter, get_post_type_archive_link(get_post_type()), get_post_type_object(get_post_type())->labels->name);

    // } elseif(is_singular( ['dictionary'] )){
    //     $position_counter = 2;
    //     $itemListElements[] = $ListItem($position_counter, get_post_type_archive_link(get_post_type()), get_post_type_object(get_post_type())->labels->name);
    //     $position_counter++;
    //     $itemListElements[] = $ListItem($position_counter, get_the_permalink(), get_the_title());

    } else if(is_single()){
        $category = get_the_category();
        $position_counter = 2;

        $cat = $category[count($category)-1]->term_id;

        $category_hierarchies = array_reverse(get_the_category_hierarchy($cat));
        foreach($category_hierarchies as $category_hierarchy){
            $itemListElements[] = $ListItem($position_counter, get_category_link($category_hierarchy->term_id), $category_hierarchy->name);
            $position_counter++;
        }

        $itemListElements[] = $ListItem($position_counter, get_the_permalink(), get_the_title());

    }

    else if(is_tag()){
        global $tag_id;
        $itemListElements[] = $ListItem(2, get_term_link($tag_id), get_term($tag_id)->name);

    } else if(is_search()){
        return false;

    } elseif(is_author()){
        $position_counter = 2;
        $itemListElements[] = $ListItem($position_counter, get_permalink(get_page_by_path('authors')->ID), get_the_title(get_page_by_path('authors')->ID));
        $position_counter++;
        $itemListElements[] = $ListItem($position_counter, get_author_posts_url($GLOBALS['author']), get_userdata($GLOBALS['author'])->display_name);

    } else if(is_404()){
        return false;

    } else {
        return '<!-- <p style="display:none;">出力条件未定義です</p> -->';
    }

    $breabcrumb_data['itemListElement'] = $itemListElements;

    $json_data = json_encode($breabcrumb_data, JSON_UNESCAPED_UNICODE); // JSON_UNESCAPED_SLASHES

    $script_json_data = sprintf('<script type="application/ld+json">%s</script>', $json_data);

    return $script_json_data;
}

/**
 * 関連商品のIDを取得
 */
function get_relation_item_ids($post_meta){
    // カンマ区切りをexplode

    $ids = explode(',', $post_meta);

    foreach($ids as $id){
        // 半角 or 全角スペース削除
        $id = preg_replace("/( |　)+/", "", $id );

        // 数字 or 数値文字であることを判定
        $id = is_numeric($id) ? $id : null ;

        if(!is_null($id)) $normalized_ids[] = $id;
    }
    
    return $normalized_ids;
}

/***
 * カスタムメニューの追加
 */
if ( ! function_exists( 'lab_setup' ) ) :

    function lab_setup() {
        
        register_nav_menus( array(
            'global' => 'グローバルナビ',
            'pc-global' => 'グローバルナビ（PC表示のみ）',
            'sp-dynamic' => 'SPダイナミックナビ',
            'footer' => 'フッターナビ',
        ) );
        
}
endif;
add_action( 'after_setup_theme', 'lab_setup' );

/**
 * カスタムメニューのデフォルト出力をカスタマイズ
 * 参考：https://blog-and-destroy.com/6842
 */
// liに付与されるidを全て削除
function my_nav_menu_id( $menu_id ){
	// liタグのidを削除
	$id = NULL;
    return $id;
}
add_filter( 'nav_menu_item_id', 'my_nav_menu_id' );

// liに付与されるclassを全て削除
function my_nav_menu_class( $classes, $item ) {
    if( $classes[0] ){
    	// 管理画面からメニューにclassの値を設定した場合には、その値以外を削除
        array_splice( $classes, 1 );
    }else{
		// 管理画面からメニューにclassの値を設定していない場合には、すべてのclassを削除
		$classes = array();
	}
    
    // 現在のページのliタグに、classの値としてcurrentを付与
    if( $item -> current == true ) {
        $classes[] = 'current';
    }
		
    return $classes;
}
add_filter( 'nav_menu_css_class', 'my_nav_menu_class', 10, 2 );

/***
 * WP SEOのタイトル出力
 */
function my_wpseo_title($title){

    if( is_category() || is_single() ){
        global $cat;
        
        $category = (is_single()) ? array_reverse(get_the_category())[0] : get_category($cat);
        $categories = get_the_category_hierarchy($category->term_id, $$categories);

        $count = 0;
        foreach($categories as $category){
            $title = ($count == count($categories)-1) ? $category->name.' '.$title : ' - '.$category->name.' '.$title;
            $count++;
        }
    } 

	return $title;
};
add_filter( 'wpseo_title', 'my_wpseo_title');

/***
 * 独自プラグインのインクルード
 * 
 */
include 'my-plugins/toppage-content.php';

/***
 * カラーミーショップのコード生成(singleページ用)
 */
function get_color_me_shop_item($pid, $style='standard') {

    $url     = 'https://vivid-shop.shop-pro.jp';
    $mode    = 'cartjs';
    $name    = 'y';          // 商品名
    $img     = 'y';          // 商品画像
    $expl    = 'y';          // 商品詳細
    $stock   = get_field( 'stock_display',get_the_ID()) ? 'y' : 'n';          // 在庫数
    $price   = 'y';          // 販売価格
    $inq     = 'n';          // 問い合わせリンク
    $sk      = 'n';          // 特商法リンク
    $charset = 'euc-jp';

    $item_script_url = 
    $url
    .'/?mode='. $mode
    .'&pid='. $pid
    .'&style='. $style
    .'&name='. $name
    .'&img='. $img
    .'&expl='. $expl
    .'&stock='. $stock
    .'&price='. $price
    .'&inq='. $inq
    .'&sk='. $sk
    .'&charset=' . $charset;
    
    $color_me_shop_item_script = '<script src="'. $item_script_url .'"></script>';

    return $color_me_shop_item_script;

}

/***
 * カラーミーショップのコード生成(arcvhive用)
 */
function get_color_me_shop_item_archive($pid, $style='standard') {

    $url     = 'https://vivid-shop.shop-pro.jp';
    $mode    = 'cartjs';
    $name    = 'y';          // 商品名
    $img     = 'y';          // 商品画像
    $expl    = 'n';          // 商品詳細
    $stock   = get_field( 'stock_display',get_the_ID()) ? 'y' : 'n';          // 在庫数
    $price   = 'y';          // 販売価格
    $inq     = 'n';          // 問い合わせリンク
    $sk      = 'n';          // 特商法リンク
    $charset = 'euc-jp';

    $item_script_url = 
    $url
    .'/?mode='. $mode
    .'&pid='. $pid
    .'&style='. $style
    .'&name='. $name
    .'&img='. $img
    .'&expl='. $expl
    .'&stock='. $stock
    .'&price='. $price
    .'&inq='. $inq
    .'&sk='. $sk
    .'&charset=' . $charset;
    
    $color_me_shop_item_script = '<script src="'. $item_script_url .'"></script>';

    return $color_me_shop_item_script;

}