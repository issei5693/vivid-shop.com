<!DOCTYPE html>
<html>   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <title>Yoast SEO</title>
    <meta name="description" content="Yoast SEO">

    <?php wp_head(); ?>
</head>

<body>

<div id="wrapper">
    <div id="gnavctr">
        <ul class="p-slide-gnav-list">
            <li class="p-slide-gnav-list__close-button"><span id="gnavctr-switch-cls"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-cross.png"></span></li>
            <li class="p-slide-gnav-list__item"><a class="p-slide-gnav-list__link" href="">TOP</a></li>
            <li class="p-slide-gnav-list__item"><a class="p-slide-gnav-list__link" href="">ブランドから探す</a></li>
            <li class="p-slide-gnav-list__item"><a class="p-slide-gnav-list__link" href="">カテゴリから探す</a></li>
            <li class="p-slide-gnav-list__item"><a class="p-slide-gnav-list__link" href="">ご注文方法</a></li>
            <li class="p-slide-gnav-list__item"><a class="p-slide-gnav-list__link" href="">特定商取引法</a></li>
            <li class="p-slide-gnav-list__item"><a class="p-slide-gnav-list__link" href="">お問い合わせ</a></li>
        </ul>
    </div>
    <header class="l-header">
        <div class="l-header__primary">
            <div class="l-header__primary-first">
                <figure class="c-logo">
                    <a class="c-logo__link" href="#">
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
                        <a href="" class="c-icon">
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
            <ul class="p-global-nav-list">
                <li class="p-global-nav-list__item"><a class="p-global-nav-list__link" href="">TOP</a></li>
                <li class="p-global-nav-list__item"><a class="p-global-nav-list__link" href="">ブランドから探す</a></li>
                <li class="p-global-nav-list__item"><a class="p-global-nav-list__link" href="">カテゴリから探す</a></li>
                <li class="p-global-nav-list__item"><a class="p-global-nav-list__link" href="">グロナビ項目</a></li>
                <li class="p-global-nav-list__item"><a class="p-global-nav-list__link" href="">グロナビ項目</a></li>
            </ul>
        </div>
    </header>

    <main class="l-main">