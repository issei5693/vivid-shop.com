<?php
/*
Template Name: カテゴリリストページ
*/
?>

<?php get_header(); ?>

<div class="l-main__content">
    <div class="l-main__content-primary">

        <div class="l-main__content-primary-first">
            <h1 class="c-icon-header"><?php the_title(); ?></h1>
            <ul class="p-category-list">
                <?php
                $tags = get_tags();
                foreach($tags as $tag): ?>
                    <li class="p-category-list__item">
                        <a class="c-label" href="<?php echo get_term_link( $tag, 'tag' ); ?>"><?php echo $tag->name; ?></a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>

    </div>
    <aside class="l-main__content-secondary">
        <?php get_sidebar(); ?>
    </aside>
</div>

<?php get_footer(); ?>