<?php

acf_add_local_field_group(array (
    'key' => 'group_5891a8ad7dcf1',
    'title' => 'Contents',
    'fields' => array (
        array (
            'layouts' => array (
                [
                    'key' => 'layout_portraits',
                    'name' => 'portraits',
                    'label' => 'Portraits',
                    'display' => 'block',
                    'sub_fields' => [
                        [
                            'key' => 'field_content_title5',
                            'label' => 'Titre du bloc',
                            'name' => 'block_title',
                            'type' => 'text',
                            'instructions' => 'Optionnel. Affiche un titre avant le bloc.',
                        ],
                        [
                            'key' => 'field_portaits_layout',
                            'label' => 'Affichage',
                            'name' => 'portraits_layout',
                            'type' => 'radio',
                            'layout' => 'vertical',
                            'choices' => array (
                                'top' => 'Image on top',
                                'side' => 'Image on the side',
                            ),
                            'default_value' => 'top',
                            'return_format' => 'value',
                        ],
                        [
                            'key' => 'field_portraits_list',
                            'label' => 'Portraits',
                            'name' => 'portraits_list',
                            'type' => 'repeater',
                            'layout' => 'row',
                            'sub_fields' => [
                                [
                                    'key' => 'field_portraits_image',
                                    'label' => 'Portraits',
                                    'name' => 'portraits_image',
                                    'type' => 'image',
                                    'required' => true
                                ],
                                [
                                    'key' => 'field_portraits_name',
                                    'label' => 'Name',
                                    'name' => 'portraits_name',
                                    'type' => 'text',
                                    'required' => true
                                ],
                                [
                                    'key' => 'field_portraits_function',
                                    'label' => 'Function',
                                    'name' => 'portraits_text',
                                    'type' => 'text',
                                ],
                                [
                                    'key' => 'field_portraits_phone',
                                    'label' => 'Phone number',
                                    'name' => 'portraits_phone',
                                    'type' => 'text',
                                ],
                                [
                                    'key' => 'field_portraits_email',
                                    'label' => 'Email',
                                    'name' => 'portraits_email',
                                    'type' => 'email',
                                ],
                                [
                                    'key' => 'field_portraits_description',
                                    'label' => 'Description',
                                    'name' => 'portraits_description',
                                    'type' => 'textarea',
                                ],
                            ]
                        ],
                    ]
                ],
                [
                    'key' => 'layout_logo_grid',
                    'name' => 'logo_grid',
                    'label' => 'Grille de logos',
                    'display' => 'block',
                    'sub_fields' => [
                        [
                            'key' => 'field_content_title0',
                            'label' => 'Titre du bloc',
                            'name' => 'block_title',
                            'type' => 'text',
                            'instructions' => 'Optionnel. Affiche un titre avant le bloc.',
                        ],
                        [
                            'key' => 'layout_logo_grid_gallery',
                            'name' => 'logo_grid_gallery',
                            'label' => 'Logos',
                            'type' => 'repeater',
                            'sub_fields' => [
                                [
                                    'key' => 'field_logo_image',
                                    'label' => 'Logo',
                                    'name' => 'logo_image',
                                    'type' => 'image',
                                ],
                                [
                                    'key' => 'field_logo_url',
                                    'label' => 'URL',
                                    'name' => 'logo_url',
                                    'type' => 'url',
                                ],
                            ]
                        ]
                    ]
                ],
                array (
                    'key' => 'layout_video_presentation',
                    'name' => 'video_presentation',
                    'label' => 'Video presentation',
                    'display' => 'block',
                    'sub_fields' => [
                        [
                            'key' => 'field_content_title1',
                            'label' => 'Titre du bloc',
                            'name' => 'block_title',
                            'type' => 'text',
                            'instructions' => 'Optionnel. Affiche un titre avant le bloc.',
                        ],
                        [
                            'key' => 'field_video_presentation_chapters',
                            'label' => 'Chapters',
                            'name' => 'video_presentation_chapters',
                            'type' => 'repeater',
                            'layout' => 'row',
                            'required' => 1,
                            'sub_fields' => [
                                [
                                    'return_format' => 'array',
                                    'library' => 'any',
                                    'key' => 'field_video_presentation_video',
                                    'label' => 'Video',
                                    'name' => 'video_presentation_video',
                                    'type' => 'file',
                                    'mime_types' => 'mp4',
                                    'required' => 1,
                                ],
                                [
                                    'key' => 'field_video_presentation_title',
                                    'name' => 'video_presentation_title',
                                    'label' => 'Title',
                                    'type' => 'text',
                                    'required' => 1,
                                ],
                                [
                                    'key' => 'field_video_presentation_text',
                                    'name' => 'video_presentation_text',
                                    'label' => 'Text',
                                    'type' => 'wysiwyg',
                                ],
                                [
                                    'key' => 'field_video_presentation_points',
                                    'name' => 'video_presentation_points',
                                    'label' => 'Points',
                                    'type' => 'repeater',
                                    'sub_fields' => [
                                        [
                                            'key' => 'field_video_presentation_point',
                                            'name' => 'video_presentation_point',
                                            'label' => 'Point',
                                            'type' => 'text',
                                            'required' => 1,
                                        ]
                                    ]
                                ],
                            ]
                        ]
                    ]
                ),
                array (
                    'key' => 'layout_slider',
                    'name' => 'slider',
                    'label' => 'Image slider',
                    'display' => 'block',
                    'sub_fields' => [
                        [
                            'key' => 'field_content_title2',
                            'label' => 'Titre du bloc',
                            'name' => 'block_title',
                            'type' => 'text',
                            'instructions' => 'Optionnel. Affiche un titre avant le bloc.',
                        ],
                        [
                            'return_format' => 'array',
                            'library' => 'any',
                            'key' => 'field_slider_gallery',
                            'label' => 'Gallery',
                            'name' => 'slider_gallery',
                            'type' => 'gallery',
                        ]
                    ]
                ),
                array (
                    'key' => '588e1f6b43f16',
                    'name' => 'content',
                    'label' => 'Contenu',
                    'display' => 'block',
                    'sub_fields' => array (
                        [
                            'key' => 'field_content_title3',
                            'label' => 'Titre du bloc',
                            'name' => 'block_title',
                            'type' => 'text',
                            'instructions' => 'Optionnel. Affiche un titre avant le bloc.',
                        ],
                        array (
                            'key' => 'field_5891a8ad902a4',
                            'label' => 'Texte',
                            'name' => 'text',
                            'type' => 'wysiwyg',
                        ),
                        array (
                            'layout' => 'vertical',
                            'choices' => array (
                                'normal' => 'Normal',
                                'fullwidth' => 'Pleine largeur',
                            ),
                            'default_value' => 'text_on_left',
                            'return_format' => 'value',
                            'key' => 'field_5891a8ad90e4b',
                            'label' => 'Affichage',
                            'name' => 'display',
                            'type' => 'radio',
                        ),
                    ),
                    'min' => '',
                    'max' => '',
                ),
            array (
                'key' => '58cbdd7cd9ec6',
                'name' => 'call_to_action',
                'label' => 'Call To Action',
                'display' => 'block',
                'sub_fields' => array (
                    [
                        'key' => 'field_content_title4',
                        'label' => 'Titre du bloc',
                        'name' => 'block_title',
                        'type' => 'text',
                        'instructions' => 'Optionnel. Affiche un titre avant le bloc.',
                    ],
                    array (
                        'key' => 'field_58cbdd8ad9ec7',
                        'label' => 'Texte',
                        'name' => 'text',
                        'type' => 'text',
                        'required' => 1,
                    ),
                    array (
                        'key' => 'field_58cbdd96d9ec8',
                        'label' => 'Libellé du bouton',
                        'name' => 'btn_label',
                        'type' => 'text',
                        'instructions' => 'Si le champ est laissé vide, "Plus d\'informations" sera utilisé.',
                    ),
                    array (
                        'key' => 'field_58cbde3bd9ec9',
                        'label' => 'URL du bouton',
                        'name' => 'btn_url',
                        'type' => 'url',
                        'required' => 1,
                    ),
                ),
                'min' => '',
                'max' => '',
            ),
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
