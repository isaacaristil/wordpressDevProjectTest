<?php
$image_url = get_query_var('image_url', false);
$image_position = get_query_var('image_position', 'center');

if ($image_url) {
    ?>
    <div class="hero">
        <div class="hero__wrap">
            <div class="hero__image" style="background-image: url(<?= $image_url ?>);background-position:<?= $image_position ?>;">
            </div>
        </div>
    </div>
    <?php
}
?>
