<?php

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
                    'value' => 'events',
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



	acf_add_local_field_group( array(
	'key' => 'group_67d23668c7c7c',
	'title' => 'Reminder Email Options',
	'fields' => array(
		array(
			'key' => 'field_67d23669405a4',
			'label' => 'Connected Events',
			'name' => 'connected_events',
			'aria-label' => '',
			'type' => 'relationship',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'events',
			),
			'post_status' => array(
				0 => 'publish',
			),
			'taxonomy' => '',
			'filters' => array(
				0 => 'search',
			),
			'return_format' => 'id',
			'min' => '',
			'max' => '',
			'allow_in_bindings' => 0,
			'elements' => '',
			'bidirectional' => 0,
			'bidirectional_target' => array(
			),
		),
		array(
			'key' => 'field_67d24fbfb1da8',
			'label' => 'From Email',
			'name' => 'from_email',
			'aria-label' => '',
			'type' => 'email',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'build@makesantafe.org',
			'allow_in_bindings' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_67d24fd5b1da9',
			'label' => 'Reply To Email',
			'name' => 'reply_to_email',
			'aria-label' => '',
			'type' => 'email',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'build@makesantafe.org',
			'allow_in_bindings' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'reminder_emails',
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
) );

	acf_add_local_field_group( array(
	'key' => 'group_67d22c8868539',
	'title' => 'Email Reminder',
	'fields' => array(
		array(
			'key' => 'field_67d22c88688d3',
			'label' => 'Subject',
			'name' => 'subject',
			'aria-label' => '',
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
			'maxlength' => '',
			'allow_in_bindings' => 0,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'reminder_emails',
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
) );

	acf_add_local_field_group( array(
	'key' => 'group_67d22baabc793',
	'title' => 'Reminder Email Options',
	'fields' => array(
		array(
			'key' => 'field_67d22baa39e43',
			'label' => 'Recipient',
			'name' => 'recipient',
			'aria-label' => '',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'instructors' => 'Instructor',
				'attendees' => 'Attendees',
				'both' => 'Both',
			),
			'default_value' => 'instructors',
			'return_format' => 'value',
			'allow_null' => 0,
			'other_choice' => 0,
			'allow_in_bindings' => 0,
			'layout' => 'vertical',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_67d22bee39e44',
			'label' => 'Timing',
			'name' => 'timing',
			'aria-label' => '',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'three_before' => 'Three Days Before',
				'day_of' => 'Day of Event',
				'day_after' => 'Day After Event',
			),
			'default_value' => '',
			'return_format' => 'value',
			'allow_null' => 0,
			'other_choice' => 0,
			'allow_in_bindings' => 0,
			'layout' => 'vertical',
			'save_other_choice' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'reminder_emails',
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

