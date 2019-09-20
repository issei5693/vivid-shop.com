<?php get_header(); ?>

<?php
// $argsのプロパティを変えていく
// $args = array(
//     'post_type' => 'post', 
//     'posts_per_page' => -1,
//     'no_found_rows' => true,  //ページャーを使う時はfalseに。
//  );

// $the_query = new WP_Query($args);
// if ($the_query->have_posts()) :
//   while ($the_query->have_posts()) : $the_query->the_post();
    
//   echo $id . '<br>';
//   update_post_meta( $id, 'display_order', 999999);

//   endwhile;
// endif;
// wp_reset_postdata();
?>



<div class="l-main__content">
    <div class="l-main__content-primary">
        <div class="l-main__content-primary-first u-pdg-horizon-0">
            <div class="p-first-view">
                <?php
                //if(dynamic_sidebar('slider')): ?>
                <div class="swiper-container swiper-firstview">
                    <ul class="swiper-wrapper">
                        <?php if(!dynamic_sidebar('slider')) ?>
                    </ul>

                    <div class="swiper-pagination"></div>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
                <?php// endif; ?>
            </div>

            <ul class="p-top-page-sub-banner-list">
                <?php if(!dynamic_sidebar('top_page_sub_banner')); ?>
            </ul>

        </div>

        <section class="l-main__content-primary-second">
            <h2 class="c-icon-header">新着情報</h2>
            <ul class="p-information-list">
                <?php if(!dynamic_sidebar('news')): ?>
                    <li class="p-information-list__item">新着情報はありません</li>
                <?php endif; ?>
            </ul>
        </section>

        <section class="l-main__content-primary-third">
            <h2 class="c-icon-header">今月のおすすめ商品</h2>
            <div class="swiper-container swiper-recommend-itemlist">
                <?php
                    $args = array(
                        'post_type'         => 'post', 
                        'meta_key'          => 'recommend_order',
                        'meta_value'        => '0',
                        'meta_compare'      => '>=',
                        'orderby'           => 'meta_value_num',
                        'order'             => 'ASC',
                        'posts_per_page'    => 10,
                        'no_found_rows'     => true,  //ページャーを使う時はfalseに。
                    );

                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) : ?>

                        <ul class="swiper-wrapper p-recommend-list">

                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                                <li class="archive-cart-js-item swiper-slide p-recommend-list__item">
                                    <div class="c-card">
                                        <a herf="<?php the_permalink(); ?>" onclick="window.location.href = '<?php the_permalink(); ?>'" class="c-card__link">
                                            <?php if (has_post_thumbnail()): ?>
                                                <figure class="c-card__image">
                                                    <img class="c-card__img acji-item-img" src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>">
                                                </figure>
                                            <?php else: ?>
                                                <figure class="c-card__image">
                                                    <img class="c-card__img acji-item-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ni_item-thumbnail.png" alt="<?php the_title(); ?>">    
                                                </figure>
                                            <?php endif;  ?>

                                            <h3 class="c-card__title">
                                                <!-- <span class="c-card__section"><?php echo get_the_category($id)[0]->name; ?></span> -->
                                                <span class="c-card__section acji-item-name"><?php the_title(); ?></span>
                                            </h3>

                                            <p class="c-card__content">
                                                <s class="c-card__section"><?php echo number_format(get_field('list_price')); ?>円</s>
                                                <span class="acji-item-off"></span>
                                                <span class="c-card__price acji-item-price"></span>
                                            </p>
                                        </a>
                                    </div>
                                    <?php echo get_color_me_shop_item_archive(get_field('item_id')); ?>
                                </li>

                            <?php endwhile; ?>

                        </ul>

                <?php else: ?>
                        <p>今月のおすすめ商品はありません。</p>
                <?php endif; wp_reset_postdata();?>
                
                
                <div class="swiper-pagination"></div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section>

        <section class="l-main__content-primary-fourth">
            <h2 class="c-icon-header">人気商品ランキング</h2>
            <div class="swiper-container swiper-popular-itemlist">
            <?php
                    $args = array(
                        'post_type'         => 'post', 
                        'meta_key'          => 'ranking_order',
                        'meta_value'        => '0',
                        'meta_compare'      => '>=',
                        'orderby'           => 'meta_value_num',
                        'order'             => 'ASC',
                        'posts_per_page'    => 10,
                        'no_found_rows'     => true,  //ページャーを使う時はfalseに。
                    );

                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) : ?>

                        <ul class="swiper-wrapper p-popular-list">

                            <?php $ranking_num = 1; ?>

                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            
                                <li class="archive-cart-js-item swiper-slide p-popular-list__item c-ranking-icon-<?php echo $ranking_num; ?>">
                                    <div class="c-card">
                                        <a herf="<?php the_permalink(); ?>" onclick="window.location.href = '<?php the_permalink(); ?>'" class="c-card__link">

                                            <?php if (has_post_thumbnail()): ?>
                                                <figure class="c-card__image">
                                                    <img class="c-card__img acji-item-img" src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>">
                                                </figure>
                                            <?php else: ?>
                                                <figure class="c-card__image">
                                                    <img class="c-card__img acji-item-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ni_item-thumbnail.png" alt="<?php the_title(); ?>">    
                                                </figure>
                                            <?php endif;  ?>

                                            <h3 class="c-card__title">
                                                <!-- <span class="c-card__section"><?php echo get_the_category($id)[0]->name; ?></span> -->
                                                <span class="c-card__section acji-item-name"><?php the_title(); ?></span>
                                            </h3>

                                            <p class="c-card__content">
                                                <s class="c-card__section"><?php echo number_format(get_field('list_price')); ?>円</s>
                                                <span class="acji-item-off"></span>
                                                <span class="c-card__price acji-item-price"></span>
                                            </p>

                                        </a>
                                    </div>
                                    <?php echo get_color_me_shop_item_archive(get_field('item_id')); ?>
                                </li>

                                <?php $ranking_num++; ?>

                            <?php endwhile; ?>

                        </ul>

                <?php else: ?>
                        <p>今月の人気商品ランキングはありません。</p>
                <?php endif; wp_reset_postdata();?>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section>

        <?php if(!dynamic_sidebar('top_page_text_area')) ?>

    </div>
    <aside class="l-main__content-secondary">
        <?php get_sidebar(); ?>
    </aside>
</div>

<?php get_footer(); ?>