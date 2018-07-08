<?php
$fields = get_query_var('fields', false);

if (!empty($fields['slider_gallery'])) {
    ?>
    <div class="gallery-slider">
        <?php
        foreach ($fields['slider_gallery'] as $image) {
            ?>
            <div>
                <div class="gallery-slider__image" style="background-image:url(<?= $image['sizes']['large'] ?>)"></div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
