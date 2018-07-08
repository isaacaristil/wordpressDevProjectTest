<?php
/*
Template name: Products listing
*/

use Bwap\Product;

get_header();
?>
<div class="container-fluid">
    <?php
    /**
     * Display the hero image
     */
    set_query_var('title', get_the_title());
    //set_query_var('image_url', Page::getAttachmentImage('full') ?: DEFAULT_HERO_IMAGE);
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

            $products = get_field('product_listing_related_products');

            if (!empty($products)) {
                foreach ($products as $product) {
                    $fields = get_fields($product->ID);
                    ?>
                    <div class="row row--margin">
                        <div class="col-sm-6">
                            <?php
                            set_query_var('fields', [
                                'gallery' => get_field('product_gallery', $product->ID)
                            ]);
                            get_template_part('partials/gallery', 'fader');
                            ?>
                        </div>
                        <div class="col-sm-6">
                            <h2 class="product-title"><?= $product->post_title ?></h2>
                            <div class="accordion">
                                <div class="accordion__title"><div><?= __('General description', 'hglass') ?></div><div class="accordion__indicator"></div></div>
                                <div class="accordion__content"><div><?= get_field('product_description', $product->ID) ?></div></div>
                            </div>
                            <div class="accordion">
                                <div class="accordion__title"><div><?= __('Plans and documents', 'hglass') ?></div><div class="accordion__indicator"></div></div>
                                <div class="accordion__content"><div>
                                        <?php
                                        $docs = get_field('product_documents', $product->ID);
                                        
                                        if (!empty($docs)) {
                                            foreach ($docs as $doc) {
                                                $file = $doc['product_documents_file'];
                                                ?>
                                                <div><a class="link" href="<?= $file ?>" download><?= basename($file) ?></a></div>
                                                <?php
                                            }
                                        }
                                        ?>
                                </div></div>
                            </div>
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
