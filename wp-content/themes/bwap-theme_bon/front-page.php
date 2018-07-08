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
        the_content();

        /**
         * Display flex content fields sections
         */
        do_action('display_flex_content', get_field('flex_content'));
    }
    ?>
</div>
<?php
get_footer();
