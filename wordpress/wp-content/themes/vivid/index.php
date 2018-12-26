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
    <header class="l-header">
        <figure>
            <a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"></a>
        </figure>
        <div class="p-header-sub-nav">
            <ul>
                <li>サーチフォーム</li>
                <li>買い物かごを見る</li>
            </ul>
        </div>
        <ul>
            <li><a href="">TOP</a></li>
            <li><a href="">ブランドから探す</a></li>
            <li><a href="">カテゴリから探す</a></li>
        </ul>
    </header>

    <main class="l-main">
        <div class="l-main__content">
            <div class="l-main__content-primary">

                <div class="l-main__content-primary-first">
                    <div class="p-first-view">
                        <p>スライダー画像エリア</p>
                    </div>

                    <div class="p-banners">
                        <ul>
                            <li><a href=""><img src="" alt="バナー"></a></li>
                            <li><a href=""><img src="" alt="バナー"></a></li>
                        </ul>
                    </div>
                </div>

                <section class="l-main__content-primary-second">
                    <h2>新着情報</h2>
                    <ul>
                        <li><a href="">新着情報</a></li>
                        <li><a href="">新着情報</a></li>
                        <li><a href="">新着情報</a></li>
                        <li><a href="">新着情報</a></li>
                        <li><a href="">新着情報</a></li>
                        <li><a href="">新着情報</a></li>
                    </ul>

                    <a href="">もっと見る</a>
                </section>

                <section class="l-main__content-primary-third">
                    <h2>今月のおすすめ商品</h2>
                    <ul>
                        <li><a href=""><img src="" alt="今月のおすすめ商品"></a></li>
                        <li><a href=""><img src="" alt="今月のおすすめ商品"></a></li>
                        <li><a href=""><img src="" alt="今月のおすすめ商品"></a></li>
                        <li><a href=""><img src="" alt="今月のおすすめ商品"></a></li>
                        <li><a href=""><img src="" alt="今月のおすすめ商品"></a></li>
                        <li><a href=""><img src="" alt="今月のおすすめ商品"></a></li>
                    </ul>
                </section>

                <section class="l-main__content-primary-fourth">
                    <h2>人気商品ランキング</h2>
                    <ul>
                        <li><a href=""><img src="" alt="人気商品ランキング"></a></li>
                        <li><a href=""><img src="" alt="人気商品ランキング"></a></li>
                        <li><a href=""><img src="" alt="人気商品ランキング"></a></li>
                        <li><a href=""><img src="" alt="人気商品ランキング"></a></li>
                        <li><a href=""><img src="" alt="人気商品ランキング"></a></li>
                        <li><a href=""><img src="" alt="人気商品ランキング"></a></li>
                    </ul>
                </section>

            </div>
            <aside class="l-main__content-secondry">
                <section class="l-main__content-secondry-first">
                    <h2>取扱ブランド一覧</h2>
                    <ul>
                        <li><a href="">取扱ブランド</a></li>
                        <li><a href="">取扱ブランド</a></li>
                        <li><a href="">取扱ブランド</a></li>
                        <li><a href="">取扱ブランド</a></li>
                        <li><a href="">取扱ブランド</a></li>
                        <li><a href="">取扱ブランド</a></li>
                    </ul>
                </section>
                
                <section class="l-main__content-secondry-second">
                    <h2>カテゴリ一覧</h2>
                    <ul>
                        <li><a href="">カテゴリ</a></li>
                        <li><a href="">カテゴリ</a></li>
                        <li><a href="">カテゴリ</a></li>
                        <li><a href="">カテゴリ</a></li>
                        <li><a href="">カテゴリ</a></li>
                        <li><a href="">カテゴリ</a></li>
                    </ul>
                </section>

                <div class="l-main__content-secondry-third">
                    <ul>
                        <li><a href=""><img src="" alt="サイドバーバナー"></a></li>
                    </ul>
                </div>


            </aside>
        </div>
    </main>

    <footer class="l-footer">
        <div class="l-footer__primary">
            <div class="p-footer-banner">
            </div>
        </div>

        <div class="l-footer__secondary">
            <div class="l-footer__secondary-first">
                <ul>
                    <li><a href="">フッターナビ1</a></li>
                    <li><a href="">フッターナビ1</a></li>
                    <li><a href="">フッターナビ1</a></li>
                    <li><a href="">フッターナビ1</a></li>
                </ul>
            </div>

            <div class="l-footer__secondary-secondary">
                <figure>
                    <a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"></a>
                </figure>
            </div>
        </div>

        <div class="l-footer__tertiary">
            <small class="p-copyright">&copy;<a href=""><?php echo bloginfo('name'); ?></a><small>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>