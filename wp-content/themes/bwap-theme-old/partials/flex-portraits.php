<?php
$fields = get_query_var('fields', false);
$layout = $fields['portraits_layout'] ?? 'top';
$col = ($layout == 'top') ? 4 : 6;

if (!empty($fields['portraits_list'])) {
    ?>
    <div class="row">
        <?php
        $offset = '';
        if ($layout == 'top') {
            // apply an offset if there are few elements
            if (count($fields['portraits_list']) == 2) {
                $offset = 'col-sm-offset-2 ';
            } elseif (count($fields['portraits_list']) == 1) {
                $offset = 'col-sm-offset-4 ';
            }
        }

        foreach ($fields['portraits_list'] as $k => $portrait)  {

            if ($layout == 'top' && $k % ($col-1) == 0 && $k != 0) {
                echo '</div><div class="row">';
            }
            if ($layout == 'top') {
                ?> <div class="<?= ($k == 0) ? $offset : '' ?> col-sm-<?= $col ?>"> <?php
            }
            ?>
                <div class="portrait portrait--<?= $layout ?>">
                    <?php
                    if (!empty($portrait['portraits_image'])) {
                        ?><div class="portrait__image" style="background-image: url(<?= $portrait['portraits_image']['sizes']['medium'] ?>)"></div><?php
                    }
                    ?>
                    <div class="portrait__content">
                        <?php
                        if (!empty($portrait['portraits_name'])) {
                            ?><div class="portrait__name"><?= $portrait['portraits_name'] ?></div><?php
                        }

                        if (!empty($portrait['portraits_text'])) {
                            ?><div class="portrait__function"><?= $portrait['portraits_text'] ?></div><?php
                        }

                        if (!empty($portrait['portraits_phone'])) {
                            ?><div class="portrait__phone"><?= __('Tel.', 'hglass') ?> : <?= $portrait['portraits_phone'] ?></div><?php
                        }

                        if (!empty($portrait['portraits_email'])) {
                            ?>
                            <div class="portrait__email">
                                <?= __('Email', 'hglass') ?> : <a href="mailto:<?= antispambot($portrait['portraits_email']) ?>">
                                    <?= antispambot($portrait['portraits_email']) ?>
                                </a>
                            </div>
                            <?php
                        }

                        if (!empty($portrait['portraits_description'])) {
                            ?><div class="portrait__description"><?= $portrait['portraits_description'] ?></div><?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            if ($layout == 'top') {
                ?> </div> <?php
            }
        }
        ?>
    </div>
    <?php
}
