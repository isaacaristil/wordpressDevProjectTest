<?php
$fields = get_query_var('fields', false);
?>
<div class="teaser">
    <?php
    if (!empty($fields['subtitle'])) {
        ?><div class="teaser__subtitle"><?= $fields['subtitle'] ?></div><?php
    }
    if (!empty($fields['title'])) {
        ?><div class="teaser__title"><?= $fields['title'] ?></div><?php
    }
    if (!empty($fields['text'])) {
        ?><div class="teaser__text"><?= $fields['text'] ?></div><?php
    }
    if (!empty($fields['url'])) {
        ?><a href="<?= $fields['url'] ?>" class="teaser__url btn"><?= __('Read more', 'hglass') ?></a><?php
    }
    ?>
</div>
