<?php

add_filter('mindevents_sub_event_form', function($html, $values, $sub_event_id, $parentID) {
	$html .= '<div class="form-section">';
		$html .= '<p class="label"><label for="reminderEmail">Reminder Email</label></p>';
		$html .= '<input type="email" name="reminderEmail" id="reminderEmail" value="' . (isset($values['reminderEmail']) ? $values['reminderEmail'][0] : '') . '" placeholder="">';

	$html .= '</div>';

    return $html;
}, 1, 4);

