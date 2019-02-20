<?php
/*
Template Name: ブランドリストページ
*/
?>

<?php get_header(); ?>

<div class="l-main__content">
    <div class="l-main__content-primary">

        <div class="l-main__content-primary-first">
            <h1 class="c-icon-header"><?php the_title(); ?></h1>
            <ul class="p-brand-archive-list">
            <?php
                $args = array(
                    'orderby' => 'name',
                    'parent' => 0
                );

                $categories = get_categories($args);

                foreach($categories as $category) : ?>
                    <li class="p-brand-archive-list__item">
                        <a class="p-brand-archive-list__img-link" href="<?php echo get_category_link($category->term_id); ?>">
                            <?php
                            if( !empty( get_field('brand_thumbnail', $category->taxonomy.'_'.$category->term_id)) ) :?>
                                <img class="p-brand-archive-list__img" src="<?php echo get_field('brand_thumbnail', $category->taxonomy.'_'.$category->term_id); ?>" alt="" >
                            <?php else: ?>
                                <img class="p-brand-archive-list__img" src="<?php echo get_template_directory_uri(); ?>/img/ni_brand-logo.png">
                            <?php endif; ?>
                        </a>
                        <a class="p-brand-archive-list__text-link" href="<?php echo get_category_link($category->term_id); ?>">
                            <?php echo $category->name; ?>
                        </a>
                    </li>
                <?php endforeach;
            ?>
            </ul>
        </div>
<!-- 
        <section class="l-main__content-primary-second">
            <h2 class="c-icon-header">カテゴリーページ</h2>
        </section>

        <section class="l-main__content-primary-third">
            <h2 class="c-icon-header">カテゴリーページ</h2>
        </section>

        <section class="l-main__content-primary-fourth">
            <h2 class="c-icon-header">カテゴリーページ</h2>
        </section>
-->
    </div>
    <aside class="l-main__content-secondary">
        <?php get_sidebar(); ?>
    </aside>
</div>

<?php get_footer(); ?>