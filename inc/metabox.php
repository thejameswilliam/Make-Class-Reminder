<?php
class mindReminderAdmin {


  protected static $instance = NULL;

  public function __construct() {

    add_action( 'add_meta_boxes', array($this, 'add_email_metaboxes' ));



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
    $email_type = get_field('email_type', $post->ID) ?: 'event_reminder';

    echo '<div class="metabox mind-reminder-merge-tags">';

    if (in_array($email_type, array('reservation_confirmation', 'reservation_day_before'), true)) {
      echo '<h3>Reservation Merge Tags</h3>';
      echo '<ul>';
        echo '<li><code>{first_name}</code> – Recipient\'s first name</li>';
        echo '<li><code>{last_name}</code> – Recipient\'s last name</li>';
        echo '<li><code>{email}</code> – Recipient\'s email address</li>';
        echo '<li><code>{tool_name}</code> – Name of the tool</li>';
        echo '<li><code>{tool_link}</code> – Link to the tool page</li>';
        echo '<li><code>{reservation_date}</code> – Date of the reservation</li>';
        echo '<li><code>{start_time}</code> – Reservation start time</li>';
        echo '<li><code>{end_time}</code> – Reservation end time</li>';
        echo '<li><code>{reservation_notes}</code> – Admin notes to the member about their reservation (SOPs, cleanup instructions, etc.)</li>';
        echo '<li><code>{manage_reservations_link}</code> – Link to My Account &rarr; Tool Reservations</li>';
      echo '</ul>';
    } else {
      echo '<h3>Event Merge Tags</h3>';
      echo '<ul>';
        echo '<li><code>{event_title}</code> – The name of the event</li>';
        echo '<li><code>{event_link}</code> – The link to the event page</li>';
        echo '<li><code>{start_date}</code> – The start date of the event</li>';
        echo '<li><code>{end_date}</code> – The end date of the event</li>';
        echo '<li><code>{start_time}</code> – The start time of the event</li>';
        echo '<li><code>{end_time}</code> – The end time of the event</li>';
        echo '<li><code>{excerpt}</code> – The event excerpt</li>';
        echo '<li><code>{first_name}</code> – Recipient\'s first name</li>';
        echo '<li><code>{last_name}</code> – Recipient\'s last name</li>';
        echo '<li><code>{email}</code> – Recipient\'s email address</li>';
      echo '</ul>';
    }

    echo '</div>';
  }





}//end of class

new mindReminderAdmin();
