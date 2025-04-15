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