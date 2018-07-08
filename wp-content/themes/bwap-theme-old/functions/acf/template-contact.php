<?php
acf_add_local_field_group(array (
	'key' => 'group_contact',
	'title' => 'Contents',
	'fields' => array (
            [
                'key' => 'field_contact_image',
                'name' => 'contact_image',
                'label' => 'Image',
                'instructions' => 'Image displayed beside the contact form',
                'type' => 'image',
            ],
	),
	'location' => array (
            array (
                array (
                    'param' => 'post_template',
                    'operator' => '==',
                    'value' => 'template-contact.php',
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
