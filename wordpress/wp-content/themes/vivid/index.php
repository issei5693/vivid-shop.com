<?php get_header(); ?>

<div class="l-main__content">
    <div class="l-main__content-primary">

        <div class="l-main__content-primary-first">
            <div class="p-first-view">
                <div class="swiper-container swiper-firstview">
                    <ul class="swiper-wrapper">
                        <li class="swiper-slide"><img style="width:100%" src="<?php echo get_template_directory_uri(); ?>/img/dammy-img-blue-820x400.png" alt="スライダー画像"></li>
                        <li class="swiper-slide"><img style="width:100%" src="<?php echo get_template_directory_uri(); ?>/img/dammy-img-lime-820x400.png" alt="スライダー画像"></li>
                        <li class="swiper-slide"><img style="width:100%" src="<?php echo get_template_directory_uri(); ?>/img/dammy-img-skyblue-820x400.png" alt="スライダー画像"></li>
                        <li class="swiper-slide"><img style="width:100%" src="<?php echo get_template_directory_uri(); ?>/img/dammy-img-lime-820x400.png" alt="スライダー画像"></li>
                    </ul>

                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            </div>

            <div class="p-banners">
                <ul>
                    <li style="margin-bottom: 5px;"><a href=""><img style="width:100%" src="https://placehold.jp/820x100.png"" alt="バナー"></a></li>
                    <li style="margin-bottom: 5px;"><a href=""><img style="width:100%" src="https://placehold.jp/820x100.png"" alt="バナー"></a></li>
                </ul>
            </div>
        </div>

        <section class="l-main__content-primary-second">
            <h2 class="c-icon-header">新着情報</h2>
            <?php dynamic_sidebar('news'); ?>
        </section>

        <section class="l-main__content-primary-third">
            <h2 class="c-icon-header">今月のおすすめ商品</h2>
            <div class="swiper-container swiper-recommend-itemlist">
                <ul class="swiper-wrapper p-recommend-list">
                    <li class="swiper-slide p-recommend-list__item">
                        <div class="c-card">
                            <img class="c-card__img" src="<?php echo get_template_directory_uri(); ?>/img/dammy_125x124.jpg" alt="今月のおすすめ商品">
                            <div class="c-card__content-wrap">
                                <h3 class="c-card__title">
                                    <span class="c-card__brand-name">アルソア</span>
                                    <span class="c-card__item-name">クイーンシルバー（リフィル）</span>
                                </h3>
                                <p class="c-card__off">30% OFF</p>
                                <span class="c-card__price">¥10,000円</span><s class="c-card__strikethrough">15,000円</s>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide p-recommend-list__item">
                        <div class="c-card">
                            <img class="c-card__img" src="<?php echo get_template_directory_uri(); ?>/img/dammy_125x124.jpg" alt="今月のおすすめ商品">
                            <div class="c-card__content-wrap">
                                <h3 class="c-card__title">
                                    <span class="c-card__brand-name">アルソア</span>
                                    <span class="c-card__item-name">クイーンシルバー（リフィル）</span>
                                </h3>
                                <p class="c-card__off">30% OFF</p>
                                <span class="c-card__price">¥10,000円</span><s class="c-card__strikethrough">15,000円</s>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide p-recommend-list__item">
                        <div class="c-card">
                            <img class="c-card__img" src="<?php echo get_template_directory_uri(); ?>/img/dammy_125x124.jpg" alt="今月のおすすめ商品">
                            <div class="c-card__content-wrap">
                                <h3 class="c-card__title">
                                    <span class="c-card__brand-name">アルソア</span>
                                    <span class="c-card__item-name">クイーンシルバー（リフィル）</span>
                                </h3>
                                <p class="c-card__off">30% OFF</p>
                                <span class="c-card__price">¥10,000円</span><s class="c-card__strikethrough">15,000円</s>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide p-recommend-list__item">
                        <div class="c-card">
                            <img class="c-card__img" src="<?php echo get_template_directory_uri(); ?>/img/dammy_125x124.jpg" alt="今月のおすすめ商品">
                            <div class="c-card__content-wrap">
                                <h3 class="c-card__title">
                                    <span class="c-card__brand-name">アルソア</span>
                                    <span class="c-card__item-name">クイーンシルバー（リフィル）</span>
                                </h3>
                                <p class="c-card__off">30% OFF</p>
                                <span class="c-card__price">¥10,000円</span><s class="c-card__strikethrough">15,000円</s>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide p-recommend-list__item">
                        <div class="c-card">
                            <img class="c-card__img" src="<?php echo get_template_directory_uri(); ?>/img/dammy_125x124.jpg" alt="今月のおすすめ商品">
                            <div class="c-card__content-wrap">
                                <h3 class="c-card__title">
                                    <span class="c-card__brand-name">アルソア</span>
                                    <span class="c-card__item-name">クイーンシルバー（リフィル）</span>
                                </h3>
                                <p class="c-card__off">30% OFF</p>
                                <span class="c-card__price">¥10,000円</span><s class="c-card__strikethrough">15,000円</s>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide p-recommend-list__item">
                        <div class="c-card">
                            <img class="c-card__img" src="<?php echo get_template_directory_uri(); ?>/img/dammy_125x124.jpg" alt="今月のおすすめ商品">
                            <div class="c-card__content-wrap">
                                <h3 class="c-card__title">
                                    <span class="c-card__brand-name">アルソア</span>
                                    <span class="c-card__item-name">クイーンシルバー（リフィル）</span>
                                </h3>
                                <p class="c-card__off">30% OFF</p>
                                <span class="c-card__price">¥10,000円</span><s class="c-card__strikethrough">15,000円</s>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="swiper-pagination"></div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section>

        <section class="l-main__content-primary-fourth">
            <h2 class="c-icon-header">人気商品ランキング</h2>
            <div class="swiper-container swiper-popular-itemlist">
                <ul class="swiper-wrapper p-popular-list">
                    <li class="swiper-slide p-popular-list__item">
                        <div class="c-card">
                            <img class="c-card__img" src="<?php echo get_template_directory_uri(); ?>/img/dammy_125x124.jpg" alt="今月のおすすめ商品">
                            <div class="c-card__content-wrap">
                                <h3 class="c-card__title">
                                    <span class="c-card__brand-name">アルソア</span>
                                    <span class="c-card__item-name">クイーンシルバー（リフィル）</span>
                                </h3>
                                <p class="c-card__off">30% OFF</p>
                                <span class="c-card__price">¥10,000円</span><s class="c-card__strikethrough">15,000円</s>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide p-popular-list__item">
                        <div class="c-card">
                            <img class="c-card__img" src="<?php echo get_template_directory_uri(); ?>/img/dammy_125x124.jpg" alt="今月のおすすめ商品">
                            <div class="c-card__content-wrap">
                                <h3 class="c-card__title">
                                    <span class="c-card__brand-name">アルソア</span>
                                    <span class="c-card__item-name">クイーンシルバー（リフィル）</span>
                                </h3>
                                <p class="c-card__off">30% OFF</p>
                                <span class="c-card__price">¥10,000円</span><s class="c-card__strikethrough">15,000円</s>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide p-popular-list__item">
                        <div class="c-card">
                            <img class="c-card__img" src="<?php echo get_template_directory_uri(); ?>/img/dammy_125x124.jpg" alt="今月のおすすめ商品">
                            <div class="c-card__content-wrap">
                                <h3 class="c-card__title">
                                    <span class="c-card__brand-name">アルソア</span>
                                    <span class="c-card__item-name">クイーンシルバー（リフィル）</span>
                                </h3>
                                <p class="c-card__off">30% OFF</p>
                                <span class="c-card__price">¥10,000円</span><s class="c-card__strikethrough">15,000円</s>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide p-popular-list__item">
                        <div class="c-card">
                            <img class="c-card__img" src="<?php echo get_template_directory_uri(); ?>/img/dammy_125x124.jpg" alt="今月のおすすめ商品">
                            <div class="c-card__content-wrap">
                                <h3 class="c-card__title">
                                    <span class="c-card__brand-name">アルソア</span>
                                    <span class="c-card__item-name">クイーンシルバー（リフィル）</span>
                                </h3>
                                <p class="c-card__off">30% OFF</p>
                                <span class="c-card__price">¥10,000円</span><s class="c-card__strikethrough">15,000円</s>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide p-popular-list__item">
                        <div class="c-card">
                            <img class="c-card__img" src="<?php echo get_template_directory_uri(); ?>/img/dammy_125x124.jpg" alt="今月のおすすめ商品">
                            <div class="c-card__content-wrap">
                                <h3 class="c-card__title">
                                    <span class="c-card__brand-name">アルソア</span>
                                    <span class="c-card__item-name">クイーンシルバー（リフィル）</span>
                                </h3>
                                <p class="c-card__off">30% OFF</p>
                                <span class="c-card__price">¥10,000円</span><s class="c-card__strikethrough">15,000円</s>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide p-popular-list__item">
                        <div class="c-card">
                            <img class="c-card__img" src="<?php echo get_template_directory_uri(); ?>/img/dammy_125x124.jpg" alt="今月のおすすめ商品">
                            <div class="c-card__content-wrap">
                                <h3 class="c-card__title">
                                    <span class="c-card__brand-name">アルソア</span>
                                    <span class="c-card__item-name">クイーンシルバー（リフィル）</span>
                                </h3>
                                <p class="c-card__off">30% OFF</p>
                                <span class="c-card__price">¥10,000円</span><s class="c-card__strikethrough">15,000円</s>
                            </div>
                        </div>
                    </li>
                    <li class="swiper-slide p-popular-list__item">
                        <div class="c-card">
                            <img class="c-card__img" src="<?php echo get_template_directory_uri(); ?>/img/dammy_125x124.jpg" alt="今月のおすすめ商品">
                            <div class="c-card__content-wrap">
                                <h3 class="c-card__title">
                                    <span class="c-card__brand-name">アルソア</span>
                                    <span class="c-card__item-name">クイーンシルバー（リフィル）</span>
                                </h3>
                                <p class="c-card__off">30% OFF</p>
                                <span class="c-card__price">¥10,000円</span><s class="c-card__strikethrough">15,000円</s>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section>

    </div>
    <aside class="l-main__content-secondary">
        <?php get_sidebar( $name ); ?>
    </aside>
</div>

<?php get_footer(); ?>