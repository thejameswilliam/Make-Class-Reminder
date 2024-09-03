<?php
//check if ACF is installed, if so create the nessesary feilds
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
	'key' => 'group_66d76baf5d3fc',
	'title' => 'Event Options',
	'fields' => array(
		array(
			'key' => 'field_66d76bafc40b2',
			'label' => 'Instructor',
			'name' => 'instructors',
			'aria-label' => '',
			'type' => 'user',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'role' => array(
				0 => 'instructor',
				1 => 'administrator',
			),
			'return_format' => 'object',
			'multiple' => 1,
			'allow_null' => 0,
			'allow_in_bindings' => 0,
			'bidirectional' => 0,
			'bidirectional_target' => array(
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tribe_events',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );
} );

