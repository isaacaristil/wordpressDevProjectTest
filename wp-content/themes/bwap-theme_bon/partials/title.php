<?php
/**
 * Display a small block of text holding a title, a small content and a button
 */
$fields = get_query_var('fields', false);
?>
<div class="title">
    <?php
    if (!empty($fields['title'])) {
        ?>
        <div class="title__title"><?= $fields['title'] ?></div>
        <?php
    }
    if (!empty($fields['content'])) {
        ?>
        <div class="title__content">
            <?= $fields['content'] ?>
            <?php
            if (!empty($fields['btn_url'])) {
                ?>
                <div class="title__btn"><a class="btn" href="<?= $fields['btn_url'] ?>"><?= $fields['btn_label'] ?? __('En savoir plus', 'cwge') ?></a></div>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>
</div>
