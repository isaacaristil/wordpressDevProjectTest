<?php
$fields = get_query_var('fields', false);

if (!empty($fields['gallery'])) {
    ?>
    <div class="gallery-fader">
        <?php
        foreach ($fields['gallery'] as $image) {
            ?>
            <div>
                <div class="gallery-fader__image" style="background-image:url(<?= $image['sizes']['medium'] ?>)"></div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
