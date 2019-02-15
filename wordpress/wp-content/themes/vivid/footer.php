</main>

    <footer class="l-footer">
        <div class="l-footer__primary">
            <figure class="p-footer-banner">
                <img style="width:100%" src="<?php echo get_template_directory_uri(); ?>/img//820x200.png"" alt="バナー">
            </figure>
        </div>

        <div class="l-footer__secondary">
            <div class="l-footer__secondary-first">
                <ul class="p-footer-menu-list">
                    <li class="p-footer-menu-list__item">
                        <a class="p-footer-menu-list__link" href="">ブランドから探す</a>
                    </li>
                    <li class="p-footer-menu-list__item">
                        <a class="p-footer-menu-list__link" href="">カテゴリから探す</a>
                    </li>
                    <li class="p-footer-menu-list__item">
                        <a class="p-footer-menu-list__link" href="">ご注文方法</a>
                    </li>
                    <li class="p-footer-menu-list__item">
                        <a class="p-footer-menu-list__link" href="">お支払い方法</a>
                    </li>
                    <li class="p-footer-menu-list__item">
                        <a class="p-footer-menu-list__link" href="">特定商取引法表記</a>
                    </li>
                    <li class="p-footer-menu-list__item">
                        <a class="p-footer-menu-list__link" href="">お問い合わせ</a>
                    </li>
                </ul>
            </div>
            <div class="l-footer__secondary-second">
                <figure class="c-logo">
                    <a class="c-logo__link u-txt-algn-center" href="">
                        <img class="c-logo__img--lg" src="<?php echo get_template_directory_uri(); ?>/img/logo.png"></a>
                </figure>
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