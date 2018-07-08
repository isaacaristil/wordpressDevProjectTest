<?php
get_header();

?>
<div class="container-fluid">
    <?php
    /**
     * Display the hero image
     */
    set_query_var('title', __("Page not found"));
    set_query_var('image_url', Page::getAttachmentImage('full') ?: DEFAULT_HERO_IMAGE);
    set_query_var('image_position', (get_field('v_pos') ?: 'center').' '.(get_field('h_pos') ?: 'center'));
    get_template_part('partials/hero');

    ?>
    <div class="main-body main-body--margins">
        <p><?= sprintf(__("It looks like nothing was found at this location. Maybe try visiting %s directly?"), '<a href="'.get_home_url().'">'.get_home_url().'</a>') ?></p>
    </div>
</div>
<?php
get_footer();
