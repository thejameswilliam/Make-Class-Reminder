<?php

add_filter('mindevents_sub_event_form', function($html, $values, $sub_event_id, $parentID) {

	$html .= '<div class="form-section">';
		$html .= '<p class="label"><label for="instructorEmail">Instructor</label></p>';
		$html .= '<input type="email" name="instructorEmail" id="instructorEmail" value="' . (isset($values['instructorEmail']) ? $values['instructorEmail'][0] : '') . '" placeholder="">';
	$html .= '</div>';

    return $html;
}, 1, 4);



//enque scripts only on admin screens
add_action('admin_enqueue_scripts', function () {

	wp_register_script('admin-js', MAKEREM_PLUGIN_DIR . 'assets/admin-js.js', array(), MAKEREM_PLUGIN_VERSION, true);
	wp_enqueue_script('admin-js');

	wp_localize_script( 'admin-js', 'svgvars', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' )
	));

});




add_action('wp_ajax_mindevents_get_instructors', 'mindevents_get_instructors');
function mindevents_get_instructors() {
	if($_POST['action'] == 'mindevents_get_instructors') {
		$instructor = $_POST['instructorID'];
		$instructors = get_users(array(
			'role' => 'instructor',
			'search' => '*' . esc_attr($instructor) . '*',
			'search_columns' => array('user_login', 'user_nicename', 'user_email')
		));
		$instructors = array_map(function($user) {
			return array(
				'id' => $user->ID,
				'name' => $user->display_name,
				'email' => $user->user_email
			);
		}, $instructors);
		$instructors = array_values($instructors);
		// Return the results as JSON
		wp_send_json($instructors);

	}

}



add_action('update_post_meta', 'make_sync_sub_event_instructor', 9999, 4);

function make_sync_sub_event_instructor($meta_id, $object_id, $meta_key, $_meta_value) {
	$post_type = get_post_type($object_id);
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if(!current_user_can('edit_post', $object_id)) return;
	if(defined( 'REST_REQUEST' ) && REST_REQUEST ) return;
	if(wp_is_post_autosave( $object_id )) return;
	if(wp_is_post_revision( $object_id )) return;
	if($meta_key != 'instructors') return; // Only run if the meta key is 'instructors'
	if($post_type != 'events') return;


	//get user from id
	$instructor = get_user_by('id', $_meta_value);

	if($instructor && is_object($instructor)) {
		$instructorEmail = $instructor->user_email;
	} else {
		$instructorEmail = '';
	}
	//get all sub events
	$sub_events = get_posts(array(
		'meta_query' => array(
		// 'relation' => 'AND',
		'start_clause' => array(
			'key' => 'starttime',
			'compare' => 'EXISTS',
		),
		'date_clause' => array(
			'key' => 'event_date',
			'compare' => 'EXISTS',
		),
		),
		'orderby'          => 'meta_value',
		'meta_key'         => 'event_time_stamp',
		'meta_type'        => 'DATETIME',
		'order'            => 'ASC',
		'post_type'        => 'sub_event',
		'post_parent'      => $object_id,
		'suppress_filters' => true,
		'posts_per_page'   => -1,
	));

	//if sub events exist
	if($sub_events) :
		//loop through sub events
		foreach($sub_events as $sub_event) :
			update_post_meta($sub_event->ID, 'instructorEmail', $instructorEmail);
		endforeach;
	endif;


}


