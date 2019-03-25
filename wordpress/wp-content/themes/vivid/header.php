<!DOCTYPE html>
<html>   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <title>Yoast SEO</title>
    <meta name="description" content="Yoast SEO">
    <?php echo get_json_ld_breadcrumb(); ?>

    <?php wp_head(); ?>
</head>

<body>

<div id="wrapper">
    <div id="gnavctr">
        <ul class="p-slide-gnav-list">
            <li class="p-slide-gnav-list__close-button"><span id="gnavctr-switch-cls"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-cross.png"></span></li>
            <?php
                wp_nav_menu( array(
                    'container'       => false,
                    'theme_location'  => 'sp-dynamic',
                    'items_wrap'      => '%3$s'
                ) );
            ?>
        </ul>
    </div>
    <header class="l-header">
        <div class="l-header__primary">
            <div class="l-header__primary-first">
                <figure class="c-logo">
                    <a class="c-logo__link" href="<?php echo home_url(); ?>">
                        <img class="c-logo__img" src="<?php echo get_template_directory_uri(); ?>/img/logo.png">
                        <!-- <img class="c-logo__img--sm" src="https://placehold.jp/200x80.png?text=Vivid-shop"> -->

                    </a>
                    <span class="c-logo__sub-text">化粧品ディスカウント</span>
                </figure>
            </div>
            <div class="l-header__primary-second">
                <form  class="p-pc-search-area" method="get" action="<?php echo home_url('/'); ?>">
                    <input class="p-pc-search-area__input" type="search" name="s" placeholder="キーワードを入力してください">
                    <button class="p-pc-search-area__submit" type="submit">検索</button>
                </form>
                <ul class="p-sp-header-nav-list">
                    <li class="p-sp-header-nav-list__item">
                        <a href="https://cart.shop-pro.jp/#/shops/PA01429592/checkout" class="c-icon">
                            <img class="c-icon__img--sm" src="<?php echo get_template_directory_uri(); ?>/img/icon-cart.png" alt="買い物かごを見る">
                            <span class="c-icon__ruby">買い物かご</span>
                        </a>
                    </li>
                    <li class="p-sp-header-nav-list__item">
                        <a href="javascript:void(0);" class=c-icon id="dynamic-search-area-switch">
                            <img class="c-icon__img--sm" src="<?php echo get_template_directory_uri(); ?>/img/icon-search.png" alt="商品を探す">
                            <span class="c-icon__ruby">検索</span>
                        </a>
                    </li>
                    <li class="p-sp-header-nav-list__item">
                        <a href="javascript:void(0);" class="c-icon" id="gnavctr-switch-opn">
                            <img class="c-icon__img--sm" src="<?php echo get_template_directory_uri(); ?>/img/icon-menu.png" alt="メニュー">
                            <span class="c-icon__ruby">メニュー</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="dynamic-search-area">
            <form class="p-sp-serach-area" method="get" action="<?php echo home_url('/'); ?>">
                <input class="p-sp-serach-area__input" type="search" name="s" placeholder="キーワードを入力してください">
                <button class="p-sp-serach-area__submit" type="submit">検索</button>
            </form>
        </div>
        <div class="l-header__secondary">
            <!--
            <ul class="p-global-nav-list">
                <li class="p-global-nav-list__item"><a class="p-global-nav-list__link" href="<?php echo home_url(); ?>">TOP</a></li>
                <li class="p-global-nav-list__item"><a class="p-global-nav-list__link" href="<?php echo home_url(); ?>/brand-list">ブランドから探す</a></li>
                <li class="p-global-nav-list__item"><a class="p-global-nav-list__link" href="<?php echo home_url(); ?>/category-list">カテゴリから探す</a></li>
                <li class="p-global-nav-list__item"><a class="p-global-nav-list__link" href="<?php echo home_url(); ?>/tsukaikata">ご注文方法</a></li>
                <li class="p-global-nav-list__item"><a class="p-global-nav-list__link" href="<?php echo home_url(); ?>/shiharaihouhou">お支払い方法</a></li> 
                <li class="p-global-nav-list__item"><a class="p-global-nav-list__link" href="<?php echo home_url(); ?>/contact">お問い合わせ</a></li> 
            </ul>
            -->
                <ul class="p-global-nav-list">
                    <?php
                        // 参考:https://olein-design.com/blog/register-setting-souce-code-of-custom-menu
                        wp_nav_menu( array(
                            'container'       => false,
                            'theme_location'  => 'global',
                            'items_wrap'      => '%3$s'
                        ) );
                    ?>
                    <li>
                        <ul class="p-global-nav-list__pc-only">
                            <?php
                                wp_nav_menu( array(
                                    'container'       => false,
                                    'theme_location'  => 'pc-global',
                                    'items_wrap'      => '%3$s'
                                ) );
                            ?>
                        </ul>
                    </li>
                </ul>
                
        </div>
        <div class="l-header__tertiary">
            <?php echo get_the_breadcrumb(); ?>
        </div>
    </header>

    <main class="l-main">