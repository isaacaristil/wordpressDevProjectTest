        <?php
        if (DISPLAY_FOOTER) {
            ?>
            <div class="container-fluid">
                <footer class="footer">
                    <div class="footer__block">
                        Z.I. du Vivier 16<br>
                        1690 Villaz-St-Pierre<br>
                        <?= __('Switzerland', 'hglass') ?>
                    </div>
                    <div class="footer__block">
                        <?= __('Ph.', 'hglass') ?> +41 24 441 99 52<br>
                        <a href="<?= get_permalink(8) ?>"><?= __('Send us an email', 'hglass') ?></a>
                    </div>
                </footer>
            </div>
            <?php
        }
        // mobile menu
        wp_nav_menu(array('theme_location' => 'header-menu', 'container_class' => 'pop popmenu', 'walker' => new Walker_Pop_Menu()));

        wp_footer();
        // close .main div
        if (!DISPLAY_FOOTER) {
            ?></div><?php
        }
        ?>
    </body>
</html>
