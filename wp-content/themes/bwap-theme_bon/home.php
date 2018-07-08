<?php
get_header();

set_query_var('title', get_the_title());
set_query_var('image_url', Page::getAttachmentImage('full') ?: DEFAULT_HERO_IMAGE);
set_query_var('image_position', (get_field('v_pos') ?: 'center').' '.(get_field('h_pos') ?: 'center'));
get_template_part('partials/hero');

?>
<div class="container main">
    <?php
    while ( have_posts() ) {
        the_post();
        the_content();

	$flex_contents = get_field('flex_content');
        if (!empty($flex_contents)) {
            foreach ($flex_contents as $flex) {
                set_query_var('fields', $flex);
                ?>
                <div class="section">
                    <?php get_template_part('partials/flex', $flex['acf_fc_layout']); ?>
                </div>
                <?php
            }
        }
    }
    ?>
</div>
<?php
get_footer();
