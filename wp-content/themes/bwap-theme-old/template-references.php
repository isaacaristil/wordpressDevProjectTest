<?php
/*
Template name: References listing
*/

use Bwap\Reference;

get_header();
?>
<div class="container-fluid">
    <?php
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
    <div class="main-body main-body--margins main-body--less-x-padding">
        <?php
        while ( have_posts() ) {
            the_post();
            the_content();

            $references = Reference::getAll();

            if (!empty($references)) {
                foreach ($references as $reference) {
                    ?>
                    <div class="row row--margin">
                        <div class="col-sm-6">
                            <?php
                            set_query_var('fields', [
                                'gallery' => get_field('reference_gallery', $reference->ID)
                            ]);
                            get_template_part('partials/gallery', 'fader');
                            ?>
                        </div>
                        <div class="col-sm-6">
                            <?php
                            set_query_var('fields', [
                                'title' => get_the_title($reference->ID),
                                'subtitle' => get_field('reference_year', $reference->ID),
                                'text' => get_field('reference_teaser', $reference->ID),
                                'url' => get_permalink($reference->ID),
                            ]);
                            get_template_part('partials/teaser');
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }
        }
        ?>
    </div>
</div>
<?php
get_footer();
