<?php
get_header();

?>
<div class="container-fluid">
    <?php
    /**
     * Display the hero image
     */
    set_query_var('title', __('News', 'hglass'));
    set_query_var('image_url', Page::getAttachmentImage('full') ?: DEFAULT_HERO_IMAGE);
    set_query_var('image_position', 'center center');
    get_template_part('partials/hero');
    ?>
    <div class="main-body main-body--margins main-body--less-x-padding">
        <div class="grid">
            <div class="grid__sizer"></div>
            <?php
            $cpt = 0;
            while ( have_posts() ) {
                the_post();
                ?>
                <div class="grid__item<?= $cpt == 0 ? ' grid__item--width2':'' ?>">
                    <div class="tile" data-src="<?= Page::getAttachmentImage('large') ?>">
                        <div class="tile__body">
                            <div class="tile__title"><?= get_the_title() ?></div>
                            <div class="tile__content"><?= get_the_excerpt() ?></div>
                            <div><a class="btn" href="<?= get_permalink() ?>"><?= __('Read more', 'hglass') ?></a></div>
                        </div>
                    </div>
                </div>
                <?php
                $cpt++;
            }
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
