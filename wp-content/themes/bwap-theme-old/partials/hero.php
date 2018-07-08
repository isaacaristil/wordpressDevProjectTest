<?php
$title = get_query_var('title', false);
$subtitle = get_query_var('subtitle', false);
$image_url = get_query_var('image_url', false);
$image_position = get_query_var('image_position', 'center');
$video = get_query_var('video', false);

if ($image_url) {
    ?>
    <div class="hero" style="background-image: url(<?= $image_url ?>);background-position:<?= $image_position ?>;">
    
        <?php if (!empty($video['mp4'])) {
            ?>
            <video class="hero__video" autoplay muted loop>
                <source src="<?= $video['mp4']['url'] ?>" type="video/mp4">
            </video>
            <?php
            }
        ?>

        <div>
            <h1 class="hero__title"><?= $title ?></h1>
            <?php
            if (!empty($subtitle)) {
                ?><div class="hero__subtitle"><?= $subtitle ?></div><?php
            }
            ?>
        </div>
        
    </div>
    <?php
}
?>
