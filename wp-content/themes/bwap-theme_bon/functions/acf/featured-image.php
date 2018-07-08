<?php
acf_add_local_field_group(array (
	'key' => 'group_58aefb1b970d6',
	'title' => 'Positionnement de l\'image à la Une',
	'fields' => array (
		array (
			'key' => 'field_58aefb31ef303',
			'label' => 'Positionnement horizontal',
			'name' => 'h_pos',
			'type' => 'radio',
			'choices' => array (
				'top' => 'Haut',
				'center' => 'Centre',
				'bottom' => 'Bas',
			),
			'default_value' => 'center',
		),
		array (
			'key' => 'field_58aefb84ef304',
			'label' => 'Positionnement vertical',
			'name' => 'v_pos',
			'type' => 'radio',
			'choices' => array (
				'left' => 'Gauche',
				'center' => 'Centre',
				'right' => 'Droit',
			),
			'default_value' => 'center',
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
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));
