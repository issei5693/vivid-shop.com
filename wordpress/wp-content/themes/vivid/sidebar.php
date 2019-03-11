<section class="l-main__content-secondary-first">
    <h2 class="c-icon-header">取扱ブランド一覧</h2>
    <ul class="p-brand-list">
        <?php

            $args = array(
                'orderby' => 'name',
                'parent' => 0
            );

            $categories = get_categories($args);

            foreach($categories as $category) : ?>

        <li class="p-brand-list__item">
            <a class="c-play-button" href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</section>

<section class="l-main__content-secondary-second">
    <h2 class="c-icon-header">カテゴリ一覧</h2>
    <ul class="p-category-list">
    <?php
    $tags = get_tags();
    foreach($tags as $tag): ?>
        <li class="p-category-list__item">
            <a class="c-label" href="<?php echo get_term_link( $tag, 'tag' ); ?>"><?php echo $tag->name; ?></a>
        </li>
    <?php endforeach;?>
    </ul>
</section>

<div class="l-main__content-secondary-third">
    <ul class="p-sidebar-banner-list">
        <?php if(!dynamic_sidebar('side_banner')); ?>
    </ul>
</div>