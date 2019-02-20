<?php
/*
Template Name: 通常ページ
*/
?>

<?php get_header(); ?>

<div class="l-main__content">
    <div class="l-main__content-primary">

        <section class="l-main__content-primary-first">
            <h1 class="c-icon-header"><?php the_title(); ?></h1>
            <div class="p-wp-content">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
        </section>

    </div>
    <aside class="l-main__content-secondary">
        <?php get_sidebar(); ?>
    </aside>
</div>

<?php get_footer(); ?>