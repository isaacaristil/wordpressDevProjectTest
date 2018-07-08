<?php
get_header();

set_query_var('image_url', Page::getAttachmentImage('full') ?: DEFAULT_HERO_IMAGE);
set_query_var('image_position', (get_field('v_pos') ?: 'center').' '.(get_field('h_pos') ?: 'center'));
get_template_part('partials/hero');

?>
<div class="container main">
    <?php
    while ( have_posts() ) {
        the_post();
        ?>
        <h1><?= get_the_title() ?></h1>
        <?php
        the_content();

        /**
         * The cocktail informations
         */
        ?>
        <div class="cocktail">
            <div class="cocktail__column">
                <div class="cocktail__content">
                    <div class="cocktail__header">
                        <div class="cocktail__title"><?= get_the_title() ?></div>
                    </div>
                    <div class="cocktail__body">
                        <div class="cocktail__left">
                            <?php
                            if (!empty(get_field('cocktail_ingredients'))) {
                                ?>
                                <div class="cocktail__listname"><?= __('Ingrédients', 'cwge') ?></div>
                                <?= get_field('cocktail_ingredients') ?>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="cocktail__right">
                            <?php
                            if (!empty(get_field('cocktail_methode'))) {
                                ?>
                                <div class="cocktail__listname"><?= __('Méthode', 'cwge') ?></div>
                                <?= get_field('cocktail_methode') ?>
                                <?php
                                }

                            if (!empty(get_field('cocktail_garnish'))) {
                                ?>
                                <div class="cocktail__listname"><?= __('Garnish', 'cwge') ?></div>
                                <?= get_field('cocktail_garnish') ?>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="cocktail__footer">
                        <div class="cocktail__alcool">
                        <?= get_field('cocktail_sansAlcool') ? __('Avec Alcool', 'cwge') : __('Sans Alcool', 'cwge') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cocktail__column">
                <div class="cocktail__image" style="background-image: url(<?= Page::getAttachmentImage('large') ?: DEFAULT_HERO_IMAGE ?>)"></div>
            </div>
        </div>
        <?php

        /**
         * The bar informations
         */
        $bar = get_field('cocktail_barEnRelation');
        if (!empty($bar)) {
            $bar = $bar[0];

            /**
             * Display the Le Bar block
             */
            set_query_var('fields', [
                'title' => __('Le bar', 'cwge'),
                'content' => $bar->post_content,
                'btn_url' => get_permalink($bar->ID),
            ]);
            ?>
            <div class="section">
                <?php get_template_part('partials/title'); ?>
            </div>
            <?php
            $bar = get_fields($bar->ID);
            /**
             * Display the informations about the bar
             */
            $logoUrl = $bar['bar_logo']['sizes']['medium'] ?? false;
            $logo = '';
            
            if (!empty($imgLogo)) {
                $logo = '<div class="col-sm-4"><img src="'.$imgLogo.'" class="img-responsive"></div>';
            }

            $informations = '';
            if (!empty($bar['bar_address'])) {
                $informations = '<p>'.$bar['bar_address'].'</p>';
            }

            if (!empty($bar['bar_telephone'])) {
                $informations .= '<p>T. '.$bar['bar_telephone'].'</p>';
            }

            $email = $bar['bar_email'];
            if (!empty($email)) {
                $email = antispambot($email);
                $informations .= '<p><a href="mailto:'.$email.'">'.$email.'</a></p>';
            }

            if (!empty($bar['bar_siteinternet'])) {
                $url = $bar['bar_siteinternet'];
                $informations .= '<p><a href="'.$url['url'].'" target="_blank" rel="noopener noreferrer">'.$url['title'].'</a></p>';
            }

            if (!empty($bar['bar_heuresOuverture'])) {
                $informations .= '<p><strong>'.__("Heures d'ouverture", 'cwge').'</strong><br>'.$bar['bar_heuresOuverture'].'</p>';
            }

            $outputBar = '
                <div class="row">'.
                    $logo.
                    '<div class="col-sm-8">'.
                        $informations.
                        //$map.
                    '</div>
                </div>
                ';

            set_query_var('fields', [
                'content' => $outputBar,
            ]);
            ?>
            <div class="section">
                <?php get_template_part('partials/box'); ?>
            </div>
            <?php
        }
        
    }
    ?>
</div>
<?php
get_footer();
