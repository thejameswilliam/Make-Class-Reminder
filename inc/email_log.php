<?php
class EmailLogAdminPage {

public function __construct() {
    add_action('admin_menu', array($this, 'add_email_log_submenu_page'));
}

public function add_email_log_submenu_page() {
    add_submenu_page(
        'edit.php?post_type=reminder_emails', // Parent slug
        'Email Log', // Page title
        'Email Log', // Menu title
        'manage_options', // Capability
        'email-log', // Menu slug
        array($this, 'display_email_log_page') // Callback function
    );
}

public function display_email_log_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'mind_email_log';

    // Pagination setup
    $paged = isset($_GET['paged']) ? max(0, intval($_GET['paged'] - 1)) : 0;
    $per_page = 20;
    $offset = $paged * $per_page;

    // Query to get email logs
    $total_items = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
    $logs = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name ORDER BY date_sent DESC LIMIT %d OFFSET %d", $per_page, $offset));

    // Display the logs
    echo '<div class="wrap">';
    echo '<h1>Email Log</h1>';
    echo '<table class="wp-list-table widefat striped">';
    echo '<thead><tr>';
        echo '<th>ID</th>';
        echo '<th>Sent To</th>';
        echo '<th>Email Subject</th>';
        echo '<th>Email ID</th>';
        echo '<th>Date Sent</th>';
        // echo '<th>Email Content</th>';
    echo '</tr></thead>';
    echo '<tbody>';

    if ($logs) {
        foreach ($logs as $log) {
            echo '<tr>';
            echo '<td>' . esc_html($log->id) . '</td>';
            echo '<td>' . esc_html($log->sent_to) . '</td>';
            echo '<td>' . esc_html($log->email_subject) . '</td>';
            echo '<td>' . esc_html($log->email_id) . '</td>';
            echo '<td>' . esc_html($log->date_sent) . '</td>';
            // echo '<td>' . esc_html($log->email_content) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="6">No emails found.</td></tr>';
    }

    echo '</tbody>';
    echo '</table>';

    // Pagination links
    $total_pages = ceil($total_items / $per_page);
    $current_page = $paged + 1;

    echo '<div class="tablenav"><div class="tablenav-pages">';
    echo paginate_links(array(
        'base' => add_query_arg('paged', '%#%'),
        'format' => '',
        'prev_text' => __('&laquo;'),
        'next_text' => __('&raquo;'),
        'total' => $total_pages,
        'current' => $current_page,
    ));
    echo '</div></div>';

    echo '</div>';
}
}

new EmailLogAdminPage();