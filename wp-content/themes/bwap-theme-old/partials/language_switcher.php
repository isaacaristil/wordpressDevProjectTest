<?php
$languages = icl_get_languages('skip_missing=1&orderby=code');
if (!empty($languages) && count($languages > 1)) {
    ?>
    <div class="header__lang">
        <ul class="menu">
            <?php
            foreach ($languages as $code => $l) {
                $is_current = $code == ICL_LANGUAGE_CODE;
                ?>
                <li class="header__lang-item<?= $is_current ? ' header__lang--active':'' ?>"><a href="<?= $l['url'] ?>"><?= $l['code'] ?></a></li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
}
