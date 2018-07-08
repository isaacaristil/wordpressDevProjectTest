<?php
get_header();

?>
<div class="container-fluid">
    <?php
    /**
     * Display the hero image
     */
    set_query_var('title', get_the_title());
    set_query_var('image_url', Page::getAttachmentImage('full') ?: DEFAULT_HERO_IMAGE);
    set_query_var('video', [
        'mp4' => get_field('cinemagraph_mp4'),
    ]);
    set_query_var('image_position', (get_field('v_pos') ?: 'center').' '.(get_field('h_pos') ?: 'center'));
    get_template_part('partials/hero');

    while ( have_posts() ) {
        the_post();
        ?>
        <div class="main-body">
            <?php

            the_content();

            /**
             * Display flex content fields sections
             */
            do_action('display_flex_content', get_field('flex_content'));
            ?>
        </div>
        <?php
    }
    ?>
</div>
<?php
get_footer();
