<?php get_header(); ?>

<div class="l-main__content">
    <div class="l-main__content-primary">

        <div class="l-main__content-primary-first">
            <?php

                $paged = get_query_var('paged')? get_query_var('paged') : 1;

                $key_word = $_GET['s'];
                
                $args = array(
                    's'             => $key_word,
                    'post_type'     => 'post',
                    'paged'         => $paged
                    
                );

                $the_query = new WP_Query($args); ?>

                <h1 class="c-icon-header">「<?php echo $s; ?>」のキーワードを含む商品&nbsp;<?php echo get_display_post_number($the_query); ?>件を表示中&nbsp;(全<?php echo $the_query->found_posts; ?>件)</h1>

                <?php if ($the_query->have_posts()) : ?>

                    <ul class="p-item-list">
                    <?php
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
                                        <span class="c-lisence-card__price acji-item-price"></span>
                                        <span class="acji-item-off"></span>
                                    </p>
                                </a>
                            </div>
                            <?php echo get_color_me_shop_item_archive(get_field('item_id')); ?>
                        </li>

                    <?php
                        endwhile;
                    ?>
                    </ul>

                <?php else: ?>
                
                <p>ご指定のキーワードの商品はありません。</p>
                <p>この検索結果は、「タイトル」または「本文」に指定キーワードがヒットしたアイテムのみを表示します。<br>
                ブランド名指定や、カテゴリ名指定でもタイトルか本文にその文字が含まれていなければ検索対象としてヒットしませんのでご注意ください。</p>
                <p>ブランドを指定して検索したい場合は「ブランドから探す」が便利です。</p>
                <p>カテゴリをを指定して検索したい場合は「カテゴリから探す」が便利です。</p>
                
                <?php endif; ?>

                <?php 
                    echo get_wp_query_pagenation($the_query);
                    wp_reset_postdata();
                ?>
        </div>

    </div>
    <aside class="l-main__content-secondary">
        <?php get_sidebar(); ?>
    </aside>
</div>

<?php get_footer(); ?>