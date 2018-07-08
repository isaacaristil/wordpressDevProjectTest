<?php
$references = get_posts([
    'post_type' => 'reference',
    'posts_per_page' => 5,
    'suppress_filters' => false,
]);

if (!empty($references)) {
    $images = [];
    $contents = '';

    foreach ($references as $ref) {
        $images[] = Page::getAttachmentImage('full', $ref->ID) ?: DEFAULT_HERO_IMAGE;

        $contents .= 
        '<div>'.
            '<div class="content">'.
                '<div class="content__text">'.
                     '<h3>'.$ref->post_title.'</h3><p>'.get_field('reference_teaser', $ref->ID).'</p><div class="text-center"><a class="btn" href="'.get_permalink($ref->ID).'">'.__('Read more','hglass').'</a></div>'.
                  '</div>'.
              '</div>'.
        '</div>';
    }

    set_query_var('fields', [
        'slider_gallery' => $images
    ]);
    ?>
    <div class="section section--fullwidth">
        <div class="section__content">
            <div id="references_images_slide" class="gallery-slider" data-slick='{"asNavFor":"#references_contents_slide"}'>
                <?php
                foreach ($images as $url) {
                    ?>
                    <div>
                        <div class="gallery-slider__image" style="background-image:url(<?= $url ?>)"></div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="section section--margin">
        <div class="section__content">
            <div id="references_contents_slide" class="contents-fader" data-slick='{"asNavFor":"#references_images_slide"}'>
                <?= $contents ?>
            </div>
        </div>
    </div>
    <?php
}
