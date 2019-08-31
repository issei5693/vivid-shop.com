</main>

    <footer class="l-footer">
        <!-- <div class="l-footer__primary">
            <figure class="p-footer-banner">
                <?php if(!dynamic_sidebar('top_page_footer_banner')); ?>
            </figure>
        </div> -->

        <div class="l-footer__secondary">
            <div class="l-footer__secondary-wrapper">
                <div class="l-footer__secondary-first">
                    <ul class="p-footer-menu-list">
                        <?php
                            wp_nav_menu( array(
                                'container'       => false,
                                'theme_location'  => 'footer',
                                'items_wrap'      => '%3$s'
                            ) );
                        ?>
                    </ul>
                </div>
                <div class="l-footer__secondary-second">
                    <figure class="c-logo">
                        <a class="c-logo__link u-txt-algn-center" href="">
                            <img class="c-logo__img--lg" src="<?php echo get_template_directory_uri(); ?>/img/logo.png"></a>
                    </figure>
                </div>
            </div>
        </div>

        <div class="l-footer__tertiary">
            <small class="p-copyright">&copy;<?php echo date('Y'); ?>&nbsp;<a href=""><?php echo bloginfo('name'); ?>&nbsp;all&nbsp;rights&nbsp;reserved</a></small>
        </div>
    </footer>
</div>

<?php wp_footer(); ?>
</body>
</html>