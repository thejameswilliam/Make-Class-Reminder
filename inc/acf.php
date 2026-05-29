<?php
if ( function_exists( 'acf_add_local_field_group' ) ) {
		
    acf_add_local_field_group( array(
        'key' => 'group_66d76baf5d3fc',
        'title' => 'Event Options',
        'fields' => array(
            array(
                'key' => 'field_66d76bafc40b2',
                'label' => 'Instructor',
                'name' => 'instructorID',
                'aria-label' => '',
                'type' => 'user',
                'instructions' => 'This is the default user for email notiifications. It is best to use this field when the instructor is the SAME FOR ALL sub events.',
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
                'multiple' => 0,
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
			'conditional_logic' => array(
				array(
					array(
						'field'    => 'field_makerem_email_type',
						'operator' => '==',
						'value'    => 'event_reminder',
					),
				),
				array(
					array(
						'field'    => 'field_makerem_email_type',
						'operator' => '==empty',
					),
				),
			),
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
			'key' => 'field_makerem_connected_tools',
			'label' => 'Connected Tools',
			'name' => 'connected_tools',
			'aria-label' => '',
			'type' => 'relationship',
			'instructions' => 'Leave empty to apply to all tools.',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field'    => 'field_makerem_email_type',
						'operator' => '==',
						'value'    => 'reservation_confirmation',
					),
				),
				array(
					array(
						'field'    => 'field_makerem_email_type',
						'operator' => '==',
						'value'    => 'reservation_day_before',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'make_tool',
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
			'key' => 'field_makerem_email_type',
			'label' => 'Email Type',
			'name' => 'email_type',
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
				'event_reminder'          => 'Event Reminder',
				'reservation_confirmation' => 'Reservation Confirmation',
				'reservation_day_before'  => 'Reservation Day-Before Reminder',
			),
			'default_value' => 'event_reminder',
			'return_format' => 'value',
			'allow_null' => 0,
			'other_choice' => 0,
			'allow_in_bindings' => 0,
			'layout' => 'vertical',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_67d22baa39e43',
			'label' => 'Recipient',
			'name' => 'recipient',
			'aria-label' => '',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field'    => 'field_makerem_email_type',
						'operator' => '==',
						'value'    => 'event_reminder',
					),
				),
				array(
					array(
						'field'    => 'field_makerem_email_type',
						'operator' => '==empty',
					),
				),
			),
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
			'conditional_logic' => array(
				array(
					array(
						'field'    => 'field_makerem_email_type',
						'operator' => '==',
						'value'    => 'event_reminder',
					),
				),
				array(
					array(
						'field'    => 'field_makerem_email_type',
						'operator' => '==empty',
					),
				),
			),
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

	acf_add_local_field_group( array(
	'key' => 'group_makerem_tool_notes',
	'title' => 'Reservation Notes',
	'fields' => array(
		array(
			'key'               => 'field_makerem_tool_notes',
			'label'             => 'Reservation Notes',
			'name'              => 'mtr_reservation_notes',
			'type'              => 'wysiwyg',
			'instructions'      => 'Included in confirmation and reminder emails via {reservation_notes}. Use for SOPs, cleanup procedures, safety reminders, etc.',
			'required'          => 0,
			'conditional_logic' => 0,
			'wrapper'           => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'default_value'   => '',
			'tabs'            => 'all',
			'toolbar'         => 'full',
			'media_upload'    => 0,
			'delay'           => 0,
			'allow_in_bindings' => 0,
		),
	),
	'location' => array(
		array(
			array(
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'make_tool',
			),
		),
	),
	'menu_order'            => 0,
	'position'              => 'normal',
	'style'                 => 'default',
	'label_placement'       => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen'        => '',
	'active'                => true,
	'description'           => '',
	'show_in_rest'          => 0,
) );
};

