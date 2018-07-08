<?php
acf_add_local_field_group(array (
    'key' => 'group_frontpage',
    'title' => 'Frontpage Parameters',
    'fields' => array (
        array (
            'key' => 'field_frontpage_quote',
            'label' => 'Quote',
            'name' => 'frontpage_quote',
            'type' => 'text',
        ),
    ),
    'location' => array (
        array (
            array (
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
            array (
                'param' => 'post_template',
                'operator' => '!=',
                'value' => 'template-alternative-front-page.php',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
));

