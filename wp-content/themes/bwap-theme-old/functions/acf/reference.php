<?php
acf_add_local_field_group(array (
	'key' => 'group_reference',
	'title' => 'Contents',
	'fields' => array (
            [
                'key' => 'field_reference_teaser',
                'name' => 'reference_teaser',
                'label' => 'Teaser',
                'instructions' => 'The teaser text is displayed in the list of references',
                'type' => 'textarea',
            ],
            [
                'key' => 'field_reference_year',
                'name' => 'reference_year',
                'label' => 'Year',
                'type' => 'text',
            ],
            [
                'key' => 'field_reference_gallery',
                'name' => 'reference_gallery',
                'label' => 'Gallery',
                'type' => 'gallery',
            ],
	),
	'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'reference',
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
