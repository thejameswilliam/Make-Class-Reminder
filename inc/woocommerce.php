<?php



add_action('woocommerce_account_dashboard', 'make_add_upcoming_instructor_classes', 26);
function make_add_upcoming_instructor_classes() {
    $user_id = get_current_user_id();
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
                'key' => 'instructorID',
                'value' => $user_id,
                'compare' => '='
            ),
        ),
    ));

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
                        $event_date = get_post_meta(get_the_ID(), 'event_time_stamp', true);
                        $event_date_formatted = date_i18n('l, ' . get_option('date_format') . ' ' . get_option('time_format'), strtotime($event_date));
                        $event_title = get_the_title(get_post_parent(get_the_ID()));
                        $linked_product = get_post_meta(get_the_ID(), 'linked_product', true);
                        $woocommerce_product = wc_get_product($linked_product);
                        $product_stock = $woocommerce_product ? $woocommerce_product->get_stock_quantity() : 0;
                        $starting_ticket_stock = get_post_meta(get_the_ID(), 'ticket_stock', true);
                        $event_parent = get_post_parent(get_the_ID());

                        echo '<tr>';
                            echo '<td><a href="' . esc_url(get_permalink($event_parent)) . '">' . esc_html($event_title) . '</a></td>';
                            echo '<td>' . esc_html($event_date_formatted) . '</td>';
                            echo '<td>' . make_get_event_add_to_calendar_links(get_the_ID()) . '</td>';
                            echo '<td>Tickets Sold: ' . ($starting_ticket_stock - $product_stock) . '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                echo '</table>';
            echo '</div>';
        echo '</div>';
    }
   
}
