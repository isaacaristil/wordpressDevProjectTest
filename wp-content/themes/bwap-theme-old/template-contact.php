<?php
/*
Template Name: Contact
*/
get_header();
?>
<div class="container-fluid">
    <?php
    while ( have_posts() ) {
        the_post();

        /**
         * Display the hero image
         */
        set_query_var('title', get_the_title());
        set_query_var('image_url', Page::getAttachmentImage('full') ?: DEFAULT_HERO_IMAGE);
        set_query_var('image_position', (get_field('v_pos') ?: 'center').' '.(get_field('h_pos') ?: 'center'));
        set_query_var('video', [
            'mp4' => get_field('cinemagraph_mp4'),
        ]);
        get_template_part('partials/hero');
        ?>
        <div class="main-body">
            <?php
            /**
             * Display flex content fields sections
             */
            do_action('display_flex_content', get_field('flex_content'));
            ?>
        </div>

        <div class="section" style="max-width: 1340px;margin: auto;">
            <div class="section__content">
                <div class="row">
                    <?php
                    if ($image = get_field('contact_image')) {
                        ?>
                        <div class="col-sm-6 hidden-xs">
                            <div class="box" style="
                                background-image: url(<?= $image['sizes']['medium'] ?>);
                                background-size: cover;
                                background-position: center;
                                height: 537px;
                            ">
                            
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-sm-6">
                        <div class="box">
                            <?= do_shortcode('[gravityform id="1" title="false" description="false"]') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<?php
get_footer();
