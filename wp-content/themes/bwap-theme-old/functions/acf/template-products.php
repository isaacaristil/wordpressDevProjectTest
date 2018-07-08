<?php
acf_add_local_field_group(array (
	'key' => 'group_products_listing',
	'title' => 'Contents',
	'fields' => array (
            [
                'key' => 'field_product_listing_related_products',
                'name' => 'product_listing_related_products',
                'label' => 'Products',
                'type' => 'relationship',
                'post_type' => ['product'],
            ],
	),
	'location' => array (
            array (
                array (
                    'param' => 'post_template',
                    'operator' => '==',
                    'value' => 'template-products.php',
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
