<?php get_header(); ?>

<?php 
    $tag = get_tags( ['slug'=>$tag] )[0];
?>


<div class="l-main__content">
    <div class="l-main__content-primary">

        <section class="l-main__content-primary-first">
            <?php

                $paged = get_query_var('paged')? get_query_var('paged') : 1;
                
                $args = array(
                    'post_type'     => 'post',
                    'post_status'   => 'publish',
                    'tag_id'        => $tag->term_id,
                    'paged'         => $paged
                    
                );

                $the_query = new WP_Query($args); ?>

                <h1 class="c-icon-header">「<?php echo $tag->name; ?>」のカテゴリの商品一覧&nbsp;<?php echo get_display_post_number($the_query); ?>件を表示中&nbsp;(全<?php echo $the_query->found_posts; ?>件)</h1>

                <ul class="p-item-list">
                    <?php
                        if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            
                            <li class="archive-cart-js-item p-item-list__item">
                                <div class="c-lisence-card">
                                    <a class="c-lisence-card__link" href="<?php the_permalink(); ?>">
                                        <?php
                                            if (has_post_thumbnail()): ?>
                                                <figure class="c-lisence-card__image">
                                                    <img class="c-lisence-card__img acji-item-img" src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>">
                                                </figure>
                                        <?php else: ?>
                                                <figure class="c-lisence-card__image">
                                                    <img class="c-lisence-card__img acji-item-img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ni_item-thumbnail.png" alt="<?php the_title(); ?>">    
                                                </figure>
                                        <?php endif;  ?>
                                    
                                        <h3 class="c-lisence-card__title">
                                            <span class="c-lisence-card__section"><?php echo get_the_category($id)[0]->name; ?></span>
                                            <span class="c-lisence-card__section acji-item-name"><?php the_title(); ?></span>
                                        </h3>
                                        <p class="c-lisence-card__content">
                                            <s class="c-lisence-card__section"><?php echo number_format(get_field('list_price')); ?>円</s>
                                            <span class="acji-item-off u-font-color--tomato"></span>
                                            <span class="c-lisence-card__price acji-item-price"></span>
                                        </p>
                                    </a>
                                </div>
                                <?php echo get_color_me_shop_item_archive(get_field('item_id')); ?>
                            </li>

                            <?php
                                endwhile;
                                else:
                            ?>
                            <li class="p-item-list__item">商品はありません</li>
                    <?php endif; ?>
                </ul>

                <?php
                    echo get_wp_query_pagenation($the_query);
                    wp_reset_postdata();
                ?>
        </section>

    </div>
    <aside class="l-main__content-secondary">
        <?php get_sidebar(); ?>
    </aside>
</div>

<?php get_footer(); ?>