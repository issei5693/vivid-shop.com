<?php
echo $_POST['recommend_item_1'];
echo $_POST['recommend_item_2'];
echo $_POST['recommend_item_3'];
echo $_POST['recommend_item_4'];
echo $_POST['recommend_item_5'];
?>


<div class="wrap">
    <h2>おすすめ商品</h2>
    <p>おすすめ商品の表示順を編集します。</p>

    <form method="post" action="">
    
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


        $the_query = new WP_Query($args); ?>

        <ul id="sortableArea" class="p-item-list" style="display: flex; flex-wrap: wrap;">
        <?php
            if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <li class="p-item-list__item sortable-item" style="width: 60%; border: solid 1px #ccc; border-radius: 5px; padding: 5px; margin-right: 5px; background-color: #fff;">
                <p>表示順:<span class="order-number"><?php the_field('recommend_order'); ?></span></p>
                <p><span class="sortable-item-remove">削除</span></p>
                <div class="c-lisence-card">
                    <span class="c-lisence-card__link" href="<?php the_permalink(); ?>" style="display: flex;">
                            <?php
                            if (has_post_thumbnail()): ?>
                                <figure class="c-lisence-card__image">
                                    <img class="c-lisence-card__img" src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>">
                                </figure>
                        <?php else: ?>
                                <figure class="c-lisence-card__image">
                                    <img class="c-lisence-card__img" src="<?php echo get_stylesheet_directory_uri(); ?>/img/ni_item-thumbnail.png" alt="<?php the_title(); ?>">    
                                </figure>
                        <?php endif;  ?>
                    
                        <h3 class="c-lisence-card__title">
                            <span class="c-lisence-card__section"><?php echo get_the_category($id)[0]->name; ?></span>
                            <span class="c-lisence-card__section"><?php the_title(); ?></span>
                        </h3>
                        <p class="c-lisence-card__content">
                            <span class="c-lisence-card__section">30% OFF</span>
                            <span class="c-lisence-card__price">¥10,000円</span>
                            <s>¥15,000円</s>
                        </p>
                    </span>
                </div>
                <input type='hidden' name="recommend_item_<?php the_field('recommend_order'); ?>" value="<?php the_field('recommend_order'); ?>">
            </li>

        <?php
            endwhile;
            else:
        ?>
            <li class="p-item-list__item">おすすめ商品は一つも設定されていません。</li>
        <?php
            endif;
        ?>
    </ul>

    <input type="text" class="regular-text" name="post-id" value="" placeholder="Ajax検索実装予定"><p id="add_item">追加</p>

    <?php
        $args = array(
            'post_type'         => 'post', 
            'posts_per_page'    => -1,
            'no_found_rows'     => true,  //ページャーを使う時はfalseに。
        );

        $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()) : ?>
        <select name="post_id">
            <option value="" selected="">---</option>
           
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <?php var_dump($post); ?>
                <option value="<?php the_ID(); ?>"><?php echo get_the_category()->name; ?> - <?php the_title(); ?></option>

            <?php endwhile; ?>

        </select>
    <?php else: ?>
        <p>投稿が一つもありません。</p>
    <?php endif; ?>

    <?php 
        wp_reset_postdata();
    ?>

    <!-- <table class="form-table">
        <tbody>
            <tr>
                <th scope="row">
                    <label for="company_name">商品を追加</label>
                </th>
                <td>
                    <input type="text" class="regular-text" name="post-id" value="" placeholder="Ajax検索実装予定"><p id="add_item">追加</p>
                </td>
            </tr>
        </tbody>
    </table> -->


    <?php submit_button(); ?>
 
    </form>

</div>