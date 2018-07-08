<?php
// includes all files in flex
$acf_files = glob(__dir__.'/flex/*.php');
foreach ($acf_files as $filename) {
    include $filename;
}

acf_add_local_field_group(array (
    'key' => 'group_5891a8ad7dcf1',
    'title' => 'Contents',
    'fields' => array (
        array (
            'layouts' => array (
                $flex_content,
                $flex_content_2_columns,
                $flex_video,
                $flex_gallery,
                $flex_formular,
            ),
            'min' => '',
            'max' => '',
            'button_label' => 'Ajouter un élément',
            'key' => 'field_5891a8ad89d0b',
            'label' => 'Contenu',
            'name' => 'flex_content',
            'type' => 'flexible_content',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
        ),
    ),
    'location' => array (
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
            ),
        ),
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ),
            array (
                'param' => 'page_type',
                'operator' => '!=',
                'value' => 'posts_page',
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

