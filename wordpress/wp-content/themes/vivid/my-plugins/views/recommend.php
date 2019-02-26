<div class="wrap">
    <h2>おすすめ商品</h2>
    <p>おすすめ商品の表示順を編集します。</p>
    
    <?php 
        if( $_GET['message'] == 1 ): ?>

        <div class="updated">
            <p>更新しました。</p>
        </div>

    <?php endif; ?>


    <form method="post" action="">
        <input type="hidden" name="nonce" value="my-nonce">
    
        <ul id="sortableArea" class="sortable-area">
        <?php

            $args = array(
                'post_type'         => 'post', 
                'meta_key'          => 'recommend_order',
                'meta_value'        => '0',
                'meta_compare'      => '>=',
                'orderby'           => 'meta_value_num',
                'order'             => 'ASC',
                'posts_per_page'    => -1,
                'no_found_rows'     => true,  //ページャーを使う時はfalseに。
            );
        
        
            $the_query = new WP_Query($args);

            if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <li class="sortable-item">
                <div class="sortable-item-header">
                    <ul class="sortable-item-header-list">
                        <li>
                            <span class="sortable-item-header-nav-list-item">
                                表示順:<span class="order-number"><?php the_field('recommend_order'); ?></span>
                            </span>
                        </li>
                        <li>
                            <span class="sortable-item-header-nav-list-item sortable-item-remove">削除</span>
                        </li>
                    </ul>
                </div>
                <div class="sortable-item-inner-wrapper">
                    <figure class="sortable-item-content-thunbnail">
                        <?php if (has_post_thumbnail()): ?>
                            <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>">
                        <?php else: ?>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ni_item-thumbnail.png" alt="<?php the_title(); ?>">
                        <?php endif;  ?>
                    </figure>
                    <div class="sortable-item-content">
                        <h3 class="sortable-item-title">
                            <span class="sortable-item-content-section"><?php echo get_the_category($id)[0]->name; ?></span>
                            <span class="sortable-item-content-section"><?php the_title(); ?></span>
                        </h3>
                        <p>
                            <span>30% OFF</span>
                            <span>¥10,000円</span>
                            <s>¥15,000円</s>
                        </p>
                    </div>
                </div>
                <input type='hidden' name="post_ids[]" value="<?php echo get_the_ID(); ?>">
            </li>

        <?php
            endwhile;
            else:
        ?>
            <!-- <li>おすすめ商品は一つも設定されていません。</li> -->
        <?php
            endif;
            
            wp_reset_postdata();
        ?>
    </ul>

    <?php
        $args = array(
            'post_type'         => 'post', 
            'posts_per_page'    => -1,
            'no_found_rows'     => true,  //ページャーを使う時はfalseに。
        );

        $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()) : ?>

            <?php

                $sorted_posts = [];
            
                while ($the_query->have_posts()) : $the_query->the_post();

                $category_hierarchies   = get_the_category_hierarchy(get_the_category()[count(get_the_category())-1]);
                $category_full_name     = '';
                
                foreach( array_reverse($category_hierarchies) as $category_hierarchy){
                    $category_full_name .= $category_hierarchy->name. ' ▶︎ ';
                }

                $sorted_posts[] = array(
                    'id'                    => get_the_ID(),
                    'category_full_name'    => $category_full_name
                );

            endwhile;
            
            ?>
        
    <?php else: ?>
        <p>投稿が一つもありません。</p>
    <?php endif; ?>

    <?php 
        wp_reset_postdata();
    ?>

    <div class="item_select">
        <select name="post_id" id="add-item">
            <option value="" selected="">---</option>

            <?php
                foreach($sorted_posts as $sorted_post){
                    $category_full_names[] = $sorted_post['category_full_name'];
                }

                array_multisort($category_full_names, SORT_ASC, SORT_LOCALE_STRING, $sorted_posts);
                
                foreach( $sorted_posts as $sorted_post): ?>
                    <option value="<?php echo $sorted_post['id']; ?>">
                        <?php echo $sorted_post['category_full_name'] . get_the_title($sorted_post['id']); ?>
                    </option>
            <?php
                endforeach;
            ?>

        </select>
    </div>

    <p id="add_item" class="add-item">追加</p>

    <!-- <input type="text" class="regular-text" name="post-id" value="" placeholder="Ajax検索実装予定"> -->

    <?php submit_button(); ?>
 
    </form>

</div>