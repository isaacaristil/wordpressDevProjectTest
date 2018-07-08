<?php
acf_add_local_field_group(array (
	'key' => 'group_58889e644ac1f',
	'title' => 'Options',
	'fields' => array (
		array (
			'return_format' => 'id',
			'library' => 'all',
			'key' => 'field_58889e6e0ccad',
			'label' => 'Image d\'entête par défaut',
			'name' => 'default_hero_image',
			'type' => 'image',
		),
                [
                    'key' => 'field_options_event_dates',
                    'name' => 'options_event_dates',
                    'label' => 'Date de l\'événement',
                    'type' => 'text',
                ],
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options',
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
