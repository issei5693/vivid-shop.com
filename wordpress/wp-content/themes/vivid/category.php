<?php get_header(); ?>

<?php 
    $category = get_category( $cat );
    $parent_category = $category->parent == 0 ? '' : get_category( $category->parent );
?>

<div class="l-main__content">
    <div class="l-main__content-primary">

        <section class="l-main__content-primary-first">
            <h1 class="c-icon-header">
                <?php if(!empty($parent_category)) echo $parent_category->name.' - '; ?>
                <?php echo $category->name; ?>
            </h1>
            <div class="c-card-lisence">
                <figure class="c-card-lisence__image">
                    <?php
                    if( !empty( get_field('brand_thumbnail', $category->taxonomy.'_'.$category->term_id)) ) :?>
                        <img class="c-card-lisence__img" src="<?php echo get_field('brand_thumbnail', $category->taxonomy.'_'.$category->term_id); ?>" alt="" >
                    <?php else: ?>
                        <img class="c-card-lisence__img" src="<?php echo get_template_directory_uri(); ?>/img/ni_brand-logo.png">
                    <?php endif; ?>
                </figure>
                <?php
                    if( !empty(category_description( $category->term_id ) ) ): ?>
                    <p class="c-lcard-lisence__content"><?php echo category_description( $category->term_id ); ?></p>
                <?php endif; ?>
            </div>
        </section>

        <?php
        
            $target_cat = $category->parent == 0 ? $cat : get_category($cat)->parent;

            $args = array(
                'parent' => $target_cat
            );

            $child_categories = get_categories( $args );

            if( $child_categories) : ?>

            <section class="l-main__content-primary-second">
                <h2 class="c-icon-header">シリーズ展開</h2>
                    <ul class="p-series-list">
                        <?php foreach( $child_categories as $child_category ): ?>
                        <li class="p-series-list__item">
                            <a class="c-label <?php if( $child_category->term_id == $cat ){ echo 'c-label--active'; } ?>" href="<?php echo get_category_link($child_category->term_id); ?>">
                                <?php echo $child_category->name; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
            </section>

        <?php endif ?>
        
        <?php
            $tags = get_post_added_tags($cat);

            $cat_id = $category->parent == 0 ? $category->term_id : $category->parent;

            if($tags) : ?>

            <section class="l-main__content-primary-third">
                <h2 class="c-icon-header">カテゴリで検索</h2>
                    <ul class="p-category-with-count-list">
                        <?php foreach($tags as $tag) : ?>
                            <li class="p-category-with-count-list__item">
                                <a
                                    href="<?php echo get_category_link($cat_id) . '?category=' . $tag->term_id; ?>"
                                    class="c-label<?php if($_GET['category']==$tag->term_id) echo '--active'; ?>"
                                    >
                                    <?php echo $tag->name; ?>(<?php echo $tag->cat_added_count; ?>)
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
            </section>

        <?php endif; ?>
                        
            
        <section class="l-main__content-primary-fourth">
            <?php

                $paged = get_query_var('paged')? get_query_var('paged') : 1;
                
                $args = array(
                    'post_type'     => 'post',
                    'cat'           => $cat,
                    'tag_id'        => $_GET['category'],
                    'paged'         => $paged,
                    'meta_key'      => 'display_order',
                    'orderby'       => array(
                        'meta_value_num'    => 'ASC',
                        'date'              => 'DESC'
                    ),
                    'no_found_rows'     => false
                    
                );

                $the_query = new WP_Query($args); ?>

                <h2 class="c-icon-header">☆該当商品一覧&nbsp;<?php echo get_display_post_number($the_query); ?>件を表示中&nbsp;(全<?php echo $the_query->found_posts; ?>件)</h2>

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
                                    <span class="acji-item-off"></span>
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
                    
                <?php
                    endif;
                ?>
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