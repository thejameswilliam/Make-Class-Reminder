<?php
/*------------------------------------*\
Custom Post Types
\*------------------------------------*/


function mind_reminder_create_post_types() {
    $email_args = array(
        'label'                 => __( 'Reminder Emails', 'text_domain' ),
        'description'           => __( 'Reminder Emails', 'text_domain' ),
        'labels'                => array(
            'name'                  => _x( 'Reminder Emails', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'Reminder Email', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'Reminder Emails', 'text_domain' ),
            'name_admin_bar'        => __( 'Reminder Email', 'text_domain' ),
            'archives'              => __( 'Reminder Email Archives', 'text_domain' ),
            'attributes'            => __( 'Reminder Email Attributes', 'text_domain' ),
            'parent_item_colon'     => __( 'Parent Reminder Email:', 'text_domain' ),
            'all_items'             => __( 'All Reminder Emails', 'text_domain' ),
            'add_new_item'          => __( 'Add New Reminder Email', 'text_domain' ),
            'add_new'               => __( 'Add New', 'text_domain' ),
            'new_item'              => __( 'New Reminder Email', 'text_domain' ),
            'edit_item'             => __( 'Edit Reminder Email', 'text_domain' ),
            'update_item'           => __( 'Update Reminder Email', 'text_domain' ),
            'view_item'             => __( 'View Reminder Email', 'text_domain' ),
            'view_items'            => __( 'View Reminder Emails', 'text_domain' ),
            'search_items'          => __( 'Search Reminder Email', 'text_domain' ),
            'not_found'             => __( 'Not found', 'text_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
            'featured_image'        => __( 'Featured Image', 'text_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
            'insert_into_item'      => __( 'Insert into reminder email', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this reminder email', 'text_domain' ),
            'items_list'            => __( 'Reminder Emails list', 'text_domain' ),
            'items_list_navigation' => __( 'Reminder Emails list navigation', 'text_domain' ),
            'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
        ),
        'supports'              => array( 'title', 'editor'),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-email',
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'page',
        'show_in_rest'          => false,
        // 'rest_base'             => 'events',
    );
register_post_type( 'reminder_emails', $email_args );





}

mind_reminder_create_post_types();
