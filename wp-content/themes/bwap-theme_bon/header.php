<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="header">
        <div class="container">
            <div class="header__container">
                <a class="header__logo" href="<?= get_home_url() ?>">
                    LOGO
                    <?php
                    $event_dates = get_field('options_event_dates', 'option');
                    if (!empty($event_dates)) {
                        echo '<div>'.$event_dates.'</div>';
                    }
                    ?>
                </a>
                <?php
                // mobile menu
				//=========================================	=====	=====	=====	=====CUIDADO=========================================================================
					 // wp_nav_menu(array('theme_location' => 'header-menu', 'container_class' => 'pop popmenu', 'walker' => new Walker_Main_Menu()));
				//==================================================================================================================================
                 
                ?>
                <div class="header__burger" data-target=".pop">
                    <i></i>
                    <i></i>
                    <i></i>
                </div>
            </div>
        </div>
    </header>
