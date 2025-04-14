<?php
class mindReminderAdmin {


  protected static $instance = NULL;

  public function __construct() {

    add_action( 'add_meta_boxes', array($this, 'add_email_metaboxes' ));

    add_action( 'save_post_events', array($this, 'save_meta_info'), 10, 2 );


	}
  static function add_email_metaboxes() {
    $options = get_option( MAKEREM_AJAX_PREPEND . 'support_settings' );
    // add_meta_box( $id, $title, $callback, $page, $context, $priority, $callback_args );
  	add_meta_box(
        MAKEREM_AJAX_PREPEND . 'merge_tags',
  		'Possible Merge Tags',
  		array('mindReminderAdmin', 'display_merg_tag_metabox' ),
  		'reminder_emails',
  		'side',
  		'default'
  	);

   
    

  }



  static function display_merg_tag_metabox($post) {

    echo '<div class="metabox mind-reminder-merge-tags">';
      echo '<h3>Merge Tags</h3>';
      echo '<p>Use these merge tags in your email content to personalize the email.</p>';
      echo '<ul>';
        echo '<li>{event_title} - The name of the event</li>';
        echo '<li>{event_link} - The link to the event page</li>';
        echo '<li>{start_date} - The start date of the event</li>';
        echo '<li>{end_date} - The end date of the event</li>';
        echo '<li>{start_time} - The start time of the event</li>';
        echo '<li>{end_time} - The end time of then event</li>';
        echo '<li>{excerpt} - The excerpt</li>';
        echo '<li>{first_name} - The first name of the recipient</li>';
        echo '<li>{last_name} - The last name of the recipient</li>';
        echo '<li>{email} - The email address of the recipient</li>';
      echo '</ul>';
    echo '</div>';
  }



  static function save_meta_info( $post_id, $post ) {

    /* Make sure this is our post type. */
    if($post->post_type != 'reminder_emails')
      return $post_id;


  }


}//end of class

new mindReminderAdmin();
