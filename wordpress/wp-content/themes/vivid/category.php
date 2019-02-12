<?php get_header(); ?>


<?php
$queried_object = get_queried_object();
var_dump( $queried_object );
?>

<?php $category = get_category( $cat ); ?>

<div class="l-main__content">
    <div class="l-main__content-primary">

        <div class="l-main__content-primary-first">
            <h2 class="c-icon-header"><?php echo $category->name; ?></h2>
            <figure>
                <?php
                if( !empty( get_field('brand_thumbnail', $category->taxonomy.'_'.$category->term_id)) ) :?>
                    <img class="" src="<?php echo get_field('brand_thumbnail', $category->taxonomy.'_'.$category->term_id); ?>" alt="" >
                <?php else: ?>
                    <img class="" src="https://placehold.jp/200x100.png?text=Vivid-shop">
                <?php endif; ?>
            </figure>
            <?php
                if( !empty(category_description( $category_id ) ) ): ?>
                <p><?php echo category_description( $category_id ); ?></p>
            <?php endif; ?>
        </div>

        <section class="l-main__content-primary-second">
            <h2 class="c-icon-header">N件の商品があります。</h2>
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </section>

        <section class="l-main__content-primary-third">
            <h2 class="c-icon-header">カテゴリーページ</h2>
        </section>

        <section class="l-main__content-primary-fourth">
            <h2 class="c-icon-header">カテゴリーページ</h2>
        </section>

    </div>
    <aside class="l-main__content-secondary">
        <?php get_sidebar(); ?>
    </aside>
</div>

<?php get_footer(); ?>