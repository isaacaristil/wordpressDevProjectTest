<?php
/*
Template Name: Blog
*/
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

    while ( have_posts() ) {
        the_post();
        the_content();

        $posts = get_posts([
            'post_type' => 'post',
            'posts_per_page' => -1,
            'suppress_filters' => false,
        ]);
        if (!empty($posts)) {
            ?>
            <div class="main-body main-body--margins main-body--less-x-padding">
                <div class="grid">
                    <div class="grid__sizer"></div>
                    <?php
                    foreach ($posts as $k => $my_post) {
                        $text = strip_shortcodes( $my_post->post_content );
                        $text = apply_filters( 'the_content', $text );
                        $text = str_replace(']]>', ']]&gt;', $text);
                        $excerpt_length = apply_filters( 'excerpt_length', 55 );
                        $excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
                        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
                        ?>
                        <div class="grid__item<?= $k == 0 ? ' grid__item--width2':'' ?>">
                            <div class="tile" data-src="<?= Page::getAttachmentImage('large', $my_post->ID) ?>">
                                <div class="tile__body">
                                    <div class="tile__title"><?= get_the_title($my_post->ID) ?></div>
                                    <div class="tile__content"><?= $text ?></div>
                                    <div><a class="btn" href="<?= get_permalink($my_post->ID) ?>"><?= __('Read more', 'hglass') ?></a></div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
<?php
get_footer();
