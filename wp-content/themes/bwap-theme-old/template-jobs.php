<?php
/*
Template name: Jobs listing
*/

use Bwap\Job;

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
    <div class="main-body main-body--margins">
        <?php
        while ( have_posts() ) {
            the_post();
            the_content();

            $jobs = Job::getAll();
            if (!empty($jobs)) {
                foreach ($jobs as $job) {
                    setup_postdata($job);
                    ?>
                    <div style="margin-bottom: 60px">
                        <?php
                        set_query_var('fields', [
                            'title' => get_the_title($job->ID),
                            'text' => get_the_excerpt($job->ID),
                            'url' => get_permalink($job->ID),
                        ]);
                        get_template_part('partials/teaser');
                        ?>
                    </div>
                    <?php
                } 
                wp_reset_postdata();
            } else {
                /**
                 * No jobs for the moment
                 */
                ?>
                <h2 class="text-center"><?= __('No jobs for the moment', 'hglass') ?></h2>
                <p class="text-center"><?= __('There is currently no vacant position on offer at H.Glass.', 'hglass') ?></p>
                <?php
            }
        }
        ?>
    </div>
</div>
<?php
get_footer();
