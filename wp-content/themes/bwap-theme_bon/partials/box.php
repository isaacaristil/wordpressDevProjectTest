<?php
/**
 * Display box holding decorate inner box with 2 sub box
 */
$fields = get_query_var('fields', false);
?>
<div class="box">
    <div class="box__decorate">
       <?= $fields['content'] ?>
    </div>
</div>
