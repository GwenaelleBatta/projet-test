<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
'key' => 'group_627240b294167',
'title' => 'About template',
'fields' => array(
array(
'key' => 'field_627240e4fb4bf',
'label' => 'Loisirs',
'name' => 'hobbies',
'type' => 'wysiwyg',
'instructions' => '',
'required' => 1,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'default_value' => '',
'tabs' => 'all',
'toolbar' => 'basic',
'media_upload' => 0,
'delay' => 0,
),
array(
'key' => 'field_6272418efb4c0',
'label' => 'Présentation',
'name' => 'presentation',
'type' => 'wysiwyg',
'instructions' => '',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'default_value' => '',
'tabs' => 'all',
'toolbar' => 'full',
'media_upload' => 0,
'delay' => 0,
),
array(
'key' => 'field_627241dcfb4c1',
'label' => '',
'name' => '',
'type' => 'text',
'instructions' => '',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'default_value' => '',
'placeholder' => '',
'prepend' => '',
'append' => '',
'maxlength' => '',
),
),
'location' => array(
array(
array(
'param' => 'page_template',
'operator' => '==',
'value' => 'template-about.php',
),
),
),
'menu_order' => 0,
'position' => 'normal',
'style' => 'default',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => array(
0 => 'the_content',
),
'active' => true,
'description' => '',
'show_in_rest' => 0,
));

acf_add_local_field_group(array(
'key' => 'group_622863b48f939',
'title' => 'Navigation links',
'fields' => array(
array(
'key' => 'field_622863e85db86',
'label' => 'Icone',
'name' => 'icon',
'type' => 'select',
'instructions' => '',
'required' => 1,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '',
'class' => '',
'id' => '',
),
'choices' => array(
'car' => 'Une voiture',
'palmetree' => 'Un palmier',
'envelope' => 'Une enveloppe',
'house' => 'Une maison',
),
'default_value' => false,
'allow_null' => 0,
'multiple' => 0,
'ui' => 0,
'return_format' => 'value',
'ajax' => 0,
'placeholder' => '',
),
),
'location' => array(
array(
array(
'param' => 'nav_menu_item',
'operator' => '==',
'value' => '3',
),
),
),
'menu_order' => 0,
'position' => 'normal',
'style' => 'default',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => '',
'active' => true,
'description' => '',
'show_in_rest' => 0,
));

acf_add_local_field_group(array(
'key' => 'group_6216387bad922',
'title' => 'Trip fields',
'fields' => array(
array(
'key' => 'field_6216397f099dc',
'label' => 'Date de départ',
'name' => 'departure_date',
'type' => 'date_picker',
'instructions' => '',
'required' => 1,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '50',
'class' => '',
'id' => '',
),
'display_format' => 'd/m/Y',
'return_format' => 'd/m/Y',
'first_day' => 1,
),
array(
'key' => 'field_62163a84099dd',
'label' => 'Date de retour',
'name' => 'return_date',
'type' => 'date_picker',
'instructions' => 'Optionnel, permet d\'avoir des voyages planifiés.',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array(
'width' => '50',
'class' => '',
'id' => '',
),
'display_format' => 'd/m/Y',
'return_format' => 'd/m/Y',
'first_day' => 1,
),
),
'location' => array(
array(
array(
'param' => 'post_type',
'operator' => '==',
'value' => 'trip',
),
),
),
'menu_order' => 0,
'position' => 'acf_after_title',
'style' => 'seamless',
'label_placement' => 'top',
'instruction_placement' => 'label',
'hide_on_screen' => '',
'active' => true,
'description' => '',
'show_in_rest' => 0,
));

endif;