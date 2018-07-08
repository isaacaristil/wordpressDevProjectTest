<?php
acf_add_local_field_group(array (
    'key' => 'group_product',
    'title' => 'Contents',
    'fields' => array (
        [
            'key' => 'field_product_description',		
            'name' => 'product_description',		
            'label' => 'Données techniques',		
            'type' => 'wysiwyg',		
        ],
        [
            'key' => 'field_product_documents',
            'name' => 'product_documents',
            'label' => 'Documents',
            'type' => 'repeater',
            'sub_fields' => array(
                [
                    'key' => 'field_product_documents_file',
                    'name' => 'product_documents_file',
                    'label' => 'File',
                    'type' => 'file',
                    'return_format' => 'url',
                    'library' => 'uploadedTo',
                ]
            )
        ],
        [
            'key' => 'field_product_gallery',
            'name' => 'product_gallery',
            'label' => 'Gallery',
            'type' => 'gallery',
        ],
    ),
    'location' => array (
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'product',
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
