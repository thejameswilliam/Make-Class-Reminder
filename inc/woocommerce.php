<?php



add_action('woocommerce_account_dashboard', 'make_add_upcoming_instructor_classes', 26);
function make_add_upcoming_instructor_classes() {
    $user_id = get_current_user_id();

    $defaults = array(
      'meta_query' => array(
        array(
            'key' => 'event_start_time_stamp', // Check the start date field
            'value' => date('Y-m-d 00:00:00'), // Set today's date (note the similar format)
            'compare' => '>=', // Return the ones greater than today's date
            'type' => 'DATETIME' // Let WordPress know we're working with date
        ),
         array(
            'key' => 'instructorID',
            'value' => $user_id,
            'compare' => '='
        ),
      ),
      'orderby' => 'meta_value',
      'meta_key' => 'event_start_time_stamp',
      'meta_type' => 'DATETIME',
      'order' => 'ASC',
      'post_type' => 'sub_event',
      'suppress_filters' => true,
      'posts_per_page' => -1
    );


    $sub_events = new WP_Query($defaults);

    if($sub_events->have_posts()) {
        echo '<div class="upcoming-classes alert alert-light">';
            echo '<h2>You\'re Teaching the Following Classes</h2>';
            echo '<div class="table-responsive">';
                echo '<table class="table table-striped table-sm align-middle">';
                    echo '<thead><tr>';
                        echo '<th>Class</th>';
                        echo '<th>Date & Time</th>';
                        echo '<th>Add to Calendar</th>';
                        echo '<th>Tickets Sold</th>';
                    echo '</tr></thead>';
                    echo '<tbody>';
                    while($sub_events->have_posts()) {
                        $sub_events->the_post();
                        $event_date = get_post_meta(get_the_ID(), 'event_start_time_stamp', true);
                        $event_date_formatted = date_i18n(get_option('date_format') . ' ' . get_option('time_format'), strtotime($event_date));
                        $event_title = get_the_title(get_post_parent(get_the_ID()));

                        $event_title = get_the_title(get_post_parent(get_the_ID()));
                        $linked_product = get_post_meta(get_the_ID(), 'linked_product', true);
                        $event_parent = get_post_parent(get_the_ID());
                        
                        $linked_product = get_post_meta(get_the_ID(), 'linked_product', true);
                        if ( $linked_product ) {
                           $orders = make_get_orders_ids_by_product_id( $linked_product);

                            $total_attendees = 0;
                            foreach ( $orders as $order_id ) {
                                $order = wc_get_order( $order_id );
                                if ( ! $order ) {
                                    continue;
                                }
                                foreach ( $order->get_items() as $item ) {
                                    if ( (int) $item->get_product_id() === (int) $linked_product ) {
                                        // mapi_write_log('Found matching product in order #' . $order->get_id() . ': ' . $item->get_name() . ' (Quantity: ' . $item->get_quantity() . ')');
                                        $total_attendees += (int) $item->get_quantity();
                                    }

                                }
                            }
                            $total_attendees = 'Total Attendees: ' . $total_attendees;
                        } else {
                            $total_attendees = 'N/A';
                        }
            
                        
                        echo '<tr>';
                            echo '<td><a href="' . esc_url(get_permalink($event_parent)) . '">' . esc_html($event_title) . '</a></td>';
                            echo '<td>' . esc_html($event_date_formatted) . '</td>';
                            echo '<td>' . make_get_event_add_to_calendar_links(get_the_ID()) . '</td>';
                            echo '<td class="text-nowrap">' . esc_html( $total_attendees ) . '</td>';

                        echo '</tr>';
                    }
                    echo '</tbody>';
                echo '</table>';
            echo '</div>';
        echo '</div>';
    }
   
}


function make_get_orders_ids_by_product_id( $product_id, $statuses = array('wc-completed') ) {
    global $wpdb;
    $order_ids = $wpdb->get_col( $wpdb->prepare( "
        SELECT DISTINCT order_items.order_id
        FROM {$wpdb->prefix}woocommerce_order_items as order_items
        LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta as meta ON order_items.order_item_id = meta.order_item_id
        WHERE meta.meta_key = '_product_id' 
        AND meta.meta_value = %d
    ", $product_id ) );
    return $order_ids;
}