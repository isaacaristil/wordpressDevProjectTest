<?php
$fields = get_query_var('fields', false);

$classes = '';
$classes .= $fields['display'] == 'fullwidth' ? ' content--fullwidth' : '';
?>
<div class="content<?= $classes ?>">
    <div class="content__text">
        <?php
        if (!empty($fields['text'])) {
            echo $fields['text'];
        }
        ?>
    </div>
</div>
