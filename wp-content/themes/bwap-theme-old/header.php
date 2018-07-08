<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui" />
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div style="display: none">
        <svg id="icon_menu_arrow_down" width="10" height="5" viewBox="0 0 10 5" xmlns="http://www.w3.org/2000/svg"><path d="M1 1l4 2 4-2" stroke-width="2" stroke="currentColor" fill="none"/></svg>
        <svg id="icon_menu_arrow_right" width="7" height="13" viewBox="0 0 7 13" xmlns="http://www.w3.org/2000/svg"><path d="M1 1l5 5.5L1 12" stroke="currentColor" stroke-width="1.4" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </div>
    <header class="header">
        <div class="header__container">
            <a class="header__logo" href="<?= get_home_url() ?>">
                <img src="<?= THEME_URI ?>/images/logo_full.svg" alt="<?= get_bloginfo() ?>">
            </a>
            <?php 
            wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'header__menu', 'walker' => new Walker_Main_Menu()) );
            ?>
            <div class="header__burger" data-target=".pop">
                menu
            </div>
            <div class="header__close" data-target=".header__menu">&times;</div>
        </div>
    </header>
    
    <?php
    if (!DISPLAY_FOOTER) {
        ?><div class="main"><?php
    }

