<?php



add_action('woocommerce_account_dashboard', 'make_add_upcoming_instructor_classes', 26);
function make_add_upcoming_instructor_classes() {
    
    $user_id = get_current_user_id();
    $user_email = get_userdata($user_id)->user_email;
    $now = current_time('Y-m-d H:i:s');
    $sub_events = new WP_Query(array(
        'post_type'      => 'sub_event',
        'posts_per_page' => -1,
        'orderby'        => 'meta_value',
        'meta_key'       => 'event_time_stamp',
        'meta_type'      => 'DATETIME',
        'order'          => 'ASC',
        'meta_query'     => array(
            'relation' => 'AND',
            array(
                'key'     => 'event_time_stamp',
                'value'   => $now,
                'compare' => '>=',
                'type'    => 'DATETIME'
            ),
            array(
                'key' => 'instructorEmail',
                'value' => $user_email,
                'compare' => '='
            ),
        ),
    ));

    if($sub_events->have_posts()) {
        echo '<div class="upcoming-classes alert alert-light">';
            echo '<h2>You\'re Teaching the Following Classes</h2>';
            echo '<ul>';
            while($sub_events->have_posts()) {
                $sub_events->the_post();
                //display all the sub events
                $event_date = get_post_meta(get_the_ID(), 'event_time_stamp', true);
                $event_date_formatted = date_i18n(get_option('date_format') . ' ' . get_option('time_format'), strtotime($event_date));
                $event_title = get_the_title((get_post_parent( get_the_id() )));
                $event_link = get_permalink();
                echo '<li class="mb-1">';
                    echo '<a href="' . esc_url($event_link) . '">' . esc_html($event_title) . '</a> - ' . esc_html($event_date_formatted);
                    //add to calendar link
                    echo '<span class="event-meta ps-3 text-endadd-to-calendar-dropdown mt-3">';
                        echo make_get_event_add_to_calendar_links(get_the_id());
                    echo '</span>';
                echo '</li>'; 
            }
            echo '</ul>';
        echo '</div>';
    }
   
}
