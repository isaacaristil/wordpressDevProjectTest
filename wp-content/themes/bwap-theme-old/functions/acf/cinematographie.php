<?php
acf_add_local_field_group(array (
	'key' => 'group_cinematographie',
	'title' => 'Cinémagraphe',
	'fields' => array (
            [
                'key' => 'field_cinemagraph_mp4',
                'name' => 'cinemagraph_mp4',
                'label' => 'Fichier mp4',
                'type' => 'file',
            ]
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
