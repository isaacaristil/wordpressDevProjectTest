<?php
$fields = get_query_var('fields', false);

if (!empty($fields['logo_grid_gallery'])) {
    ?>
    <div class="row">
        <?php
        $offset = '';
        if (count($fields['logo_grid_gallery']) == 2) {
            $offset = 'col-sm-offset-2 ';
        } elseif (count($fields['logo_grid_gallery']) == 1) {
            $offset = 'col-sm-offset-4 ';
        }
        foreach ($fields['logo_grid_gallery'] as $k => $logo)  {
            $image = '<img class="img-responsive" src="'.$logo['logo_image']['sizes']['medium'].'" alt="">';

            if (!empty($logo['logo_url'])) {
                $image = '<a href="'.$logo['logo_url'].'" target="_blank" rel="noreferrer noopener">'.$image.'</a>';
            }
            ?>
            <div class="<?= ($k == 0) ? $offset : '' ?>col-sm-4" style="margin-bottom: 15px">
                <?= $image ?>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
