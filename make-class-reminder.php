<?php
/**
 * Plugin Name: Make Santa Fe - Email Reminders
 * Plugin URI:https://mind.sh/are
 * Description: A plugin that integrates with Mindshare Events Calendar to send reminders to instructors and event attendees
 * Version: 1.2.1
 * Author: Mindshare Labs, Inc
 * Author URI: https://mind.sh/are
 */


class makeReminder
{
    private $logo = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 508 329.3"><defs><style>.cls-1{fill:#000;stroke-width:0px;}</style></defs><path class="cls-1" d="M126,0H0v98.6h49.4v-49.2h76.6V0Z"/><path class="cls-1" d="M382,329.3h126v-98.6h-49.4v49.2h-76.6v49.4Z"/><path class="cls-1" d="M105.4,79.1c1.5,2.7,3.2,6.1,5.1,10.1s4,8.3,6.1,13,4.2,9.4,6.3,14.3c2.1,4.9,4,9.4,5.8,13.7,1.8-4.3,3.8-8.9,5.8-13.7,2.1-4.9,4.1-9.6,6.3-14.3,2.1-4.7,4.1-9,6.1-13,1.9-4,3.7-7.4,5.1-10.1h17.5c.8,5.7,1.6,12,2.3,19.1.7,7,1.3,14.4,1.9,22,.5,7.6,1,15.3,1.5,22.9.5,7.7.8,14.9,1.2,21.6h-18.8c-.2-8.3-.6-17.4-1-27.2s-1-19.7-1.9-29.7c-1.5,3.5-3.1,7.3-5,11.5-1.8,4.2-3.6,8.4-5.4,12.6-1.8,4.2-3.5,8.2-5.1,12s-3.1,7.1-4.2,9.8h-13.5c-1.2-2.7-2.6-6-4.2-9.8s-3.4-7.8-5.1-12c-1.8-4.2-3.6-8.4-5.4-12.6s-3.5-8-5-11.5c-.8,10-1.4,19.9-1.9,29.7-.4,9.8-.7,18.9-1,27.2h-18.7c.3-6.8.7-14,1.2-21.6.5-7.7.9-15.3,1.5-22.9.5-7.6,1.2-15,1.9-22,.7-7,1.5-13.4,2.3-19.1,0,0,18.3,0,18.3,0Z"/><path class="cls-1" d="M251,164.8c-1-3-2-6-3.1-9.2-1.1-3.1-2.2-6.3-3.3-9.4h-33.4c-1.1,3.1-2.2,6.3-3.3,9.4-1.1,3.1-2.1,6.2-3,9.1h-20c3.2-9.2,6.3-17.8,9.2-25.6s5.7-15.2,8.5-22.1,5.5-13.5,8.2-19.7c2.7-6.2,5.5-12.3,8.4-18.2h18.3c2.8,5.9,5.6,12,8.3,18.2s5.5,12.8,8.3,19.7c2.8,6.9,5.6,14.3,8.5,22.1s6,16.4,9.2,25.6h-20.8v.1ZM227.8,98.5c-.4,1.2-1.1,2.9-1.9,5.1-.8,2.1-1.8,4.6-2.8,7.4-1.1,2.8-2.2,5.9-3.5,9.3s-2.6,6.9-4,10.6h24.4c-1.3-3.7-2.6-7.3-3.8-10.6-1.2-3.4-2.4-6.5-3.5-9.3s-2.1-5.3-2.9-7.4c-.8-2.2-1.5-3.9-2-5.1Z"/><path class="cls-1" d="M333.1,164.8c-1.7-2.8-3.8-5.8-6.1-9-2.4-3.2-4.9-6.5-7.6-9.8s-5.6-6.4-8.5-9.5c-3-3-5.9-5.7-8.9-8v36.3h-19.3v-85.7h19.3v32.2c5-5.2,10-10.6,15.1-16.3,5.1-5.7,9.8-11,14.2-15.8h22.7c-5.8,6.9-11.7,13.6-17.6,20s-12.1,12.9-18.6,19.3c6.8,5.7,13.5,12.5,19.8,20.3,6.4,7.8,12.5,16.5,18.4,25.9h-22.9v.1Z"/><path class="cls-1" d="M367.1,164.8v-85.7h57.9v16.2h-38.6v16.8h34.2v15.8h-34.2v20.6h41.4v16.2h-60.7v.1Z"/><path class="cls-1" d="M130,246.1c2.9,0,5.1-.4,6.5-1.2s2.1-2,2.1-3.7-.7-3.1-2.1-4.2c-1.4-1-3.7-2.2-6.8-3.5-1.5-.6-3-1.2-4.4-1.9-1.4-.6-2.6-1.4-3.7-2.3-1-.9-1.8-1.9-2.5-3.2-.6-1.2-.9-2.7-.9-4.5,0-3.5,1.3-6.3,3.9-8.4,2.6-2.1,6.2-3.1,10.7-3.1,1.1,0,2.3.1,3.4.2,1.1.1,2.2.3,3.2.5s1.8.4,2.6.6c.7.2,1.3.4,1.7.5l-1.3,6.2c-.8-.4-2-.8-3.6-1.3-1.6-.4-3.6-.7-5.9-.7-2,0-3.7.4-5.2,1.2s-2.2,2-2.2,3.7c0,.9.2,1.6.5,2.3s.8,1.3,1.5,1.8,1.5,1,2.6,1.5c1,.5,2.3.9,3.7,1.5,1.9.7,3.6,1.4,5.1,2.1,1.5.7,2.8,1.5,3.8,2.4,1.1.9,1.9,2,2.4,3.3.6,1.3.8,2.9.8,4.8,0,3.7-1.4,6.5-4.1,8.4-2.7,1.9-6.7,2.8-11.7,2.8-3.5,0-6.3-.3-8.3-.9-2-.6-3.4-1-4.1-1.3l1.3-6.2c.8.3,2.1.8,3.9,1.4,1.7.9,4.1,1.2,7.1,1.2Z"/><path class="cls-1" d="M167.9,210.3c2.9,0,5.3.4,7.3,1.1,2,.7,3.6,1.8,4.8,3.2s2.1,3,2.6,4.8c.5,1.9.8,3.9.8,6.2v25c-.6.1-1.5.2-2.6.4s-2.3.3-3.7.5-2.9.3-4.5.4c-1.6.1-3.2.2-4.8.2-2.3,0-4.3-.2-6.2-.7s-3.5-1.2-4.9-2.2-2.5-2.3-3.2-4c-.8-1.6-1.2-3.6-1.2-5.9s.4-4.1,1.3-5.7c.9-1.6,2.1-2.9,3.7-3.8,1.5-1,3.3-1.7,5.4-2.2,2-.5,4.2-.7,6.5-.7.7,0,1.5,0,2.2.1.8.1,1.5.2,2.2.3s1.3.2,1.8.3.9.2,1.1.2v-2c0-1.2-.1-2.3-.4-3.5-.3-1.2-.7-2.2-1.4-3.1-.7-.9-1.6-1.6-2.7-2.2-1.2-.5-2.7-.8-4.5-.8-2.4,0-4.4.2-6.2.5s-3.1.7-4,1l-.8-5.9c.9-.4,2.5-.8,4.6-1.2s4.3-.3,6.8-.3ZM168.5,246.1c1.7,0,3.2,0,4.5-.1s2.4-.2,3.3-.4v-11.9c-.5-.3-1.3-.5-2.5-.7s-2.6-.3-4.2-.3c-1.1,0-2.2.1-3.4.2-1.2.2-2.3.5-3.3,1s-1.8,1.2-2.5,2-1,2-1,3.3c0,2.6.8,4.3,2.5,5.3,1.6,1.1,3.8,1.6,6.6,1.6Z"/><path class="cls-1" d="M195.1,212.4c1.6-.4,3.8-.8,6.5-1.3s5.8-.7,9.4-.7c3.2,0,5.8.4,7.9,1.3,2.1.9,3.8,2.2,5,3.8,1.3,1.6,2.1,3.6,2.7,5.8.5,2.3.8,4.7.8,7.5v22.5h-7.2v-20.9c0-2.5-.2-4.6-.5-6.3s-.9-3.2-1.7-4.2c-.8-1.1-1.8-1.9-3.1-2.3-1.3-.5-2.9-.7-4.8-.7-.8,0-1.6,0-2.4.1-.8.1-1.6.1-2.3.2-.7.1-1.4.2-2,.3s-1,.2-1.3.2v33.8h-7.2v-39.1h.2Z"/><path class="cls-1" d="M245.9,211.3h15.1v6h-15.1v18.5c0,2,.2,3.7.5,5s.8,2.3,1.4,3.1c.6.7,1.4,1.3,2.3,1.6.9.3,2,.5,3.2.5,2.2,0,3.9-.2,5.2-.7,1.3-.5,2.2-.8,2.7-1l1.4,5.9c-.7.4-2,.8-3.8,1.3s-3.8.8-6.2.8c-2.7,0-5-.3-6.7-1-1.8-.7-3.2-1.7-4.3-3.1s-1.8-3.1-2.3-5.1c-.4-2-.7-4.4-.7-7v-35.7l7.2-1.2v12.1h.1Z"/><path class="cls-1" d="M283.1,210.3c2.9,0,5.3.4,7.3,1.1,2,.7,3.6,1.8,4.8,3.2,1.2,1.4,2.1,3,2.6,4.8.5,1.9.8,3.9.8,6.2v25c-.6.1-1.5.2-2.6.4s-2.3.3-3.7.5-2.9.3-4.5.4c-1.6.1-3.2.2-4.8.2-2.3,0-4.3-.2-6.2-.7-1.9-.5-3.5-1.2-4.9-2.2s-2.5-2.3-3.2-4c-.8-1.6-1.2-3.6-1.2-5.9s.4-4.1,1.3-5.7c.9-1.6,2.1-2.9,3.7-3.8,1.5-1,3.3-1.7,5.4-2.2,2-.5,4.2-.7,6.5-.7.7,0,1.5,0,2.2.1.8.1,1.5.2,2.2.3s1.3.2,1.8.3.9.2,1.1.2v-2c0-1.2-.1-2.3-.4-3.5s-.7-2.2-1.4-3.1c-.7-.9-1.6-1.6-2.7-2.2-1.2-.5-2.7-.8-4.5-.8-2.4,0-4.4.2-6.2.5-1.8.3-3.1.7-4,1l-.8-5.9c.9-.4,2.5-.8,4.6-1.2,1.9-.1,4.3-.3,6.8-.3ZM283.7,246.1c1.7,0,3.2,0,4.5-.1s2.4-.2,3.3-.4v-11.9c-.5-.3-1.3-.5-2.5-.7s-2.5-.3-4.2-.3c-1.1,0-2.2.1-3.4.2-1.2.2-2.3.5-3.3,1s-1.8,1.2-2.5,2-1,2-1,3.3c0,2.6.8,4.3,2.5,5.3,1.5,1.1,3.8,1.6,6.6,1.6Z"/><path class="cls-1" d="M343.6,191.6c2.1,0,3.9.2,5.4.5s2.6.6,3.2.8l-1.2,6.1c-.6-.3-1.5-.6-2.6-.9-1.1-.3-2.5-.4-4.2-.4-3.3,0-5.7.9-7,2.7s-2,4.3-2,7.3v3.5h15.4v6h-15.4v34h-7.2v-43.6c0-5.1,1.3-9.1,3.8-11.9,2.5-2.7,6.5-4.1,11.8-4.1Z"/><path class="cls-1" d="M355.5,231.3c0-3.5.5-6.6,1.5-9.3,1-2.6,2.4-4.8,4.1-6.6,1.7-1.7,3.6-3,5.8-3.9,2.2-.9,4.5-1.3,6.8-1.3,5.4,0,9.5,1.7,12.4,5,2.9,3.4,4.3,8.5,4.3,15.3v1.2c0,.5,0,.9-.1,1.3h-27.4c.3,4.2,1.5,7.3,3.6,9.5s5.4,3.2,9.8,3.2c2.5,0,4.6-.2,6.3-.7,1.7-.4,3-.9,3.9-1.3l1,6c-.9.5-2.4.9-4.6,1.5-2.2.5-4.7.8-7.4.8-3.5,0-6.5-.5-9-1.6s-4.6-2.5-6.3-4.3-2.9-4-3.7-6.6c-.6-2.4-1-5.1-1-8.2ZM382.9,227.4c0-3.2-.8-5.9-2.4-8-1.7-2.1-4-3.1-6.9-3.1-1.6,0-3.1.3-4.3,1-1.3.6-2.3,1.5-3.2,2.5-.9,1-1.6,2.2-2,3.5-.5,1.3-.8,2.7-1,4.1h19.8Z"/></svg>';

    public function __construct() {
        $this->userId = get_current_user_id();
        global $wpdb;
        if (!defined('MAKEREM_PLUGIN_FILE')) {
            define('MAKEREM_PLUGIN_FILE', __FILE__);
        }
        //Define all the constants 
        $this->define('MAKEREM_ABSPATH', dirname(MAKEREM_PLUGIN_FILE) . '/');
        $this->define('MAKEREM_URL', plugin_dir_url(__FILE__));
        $this->define('MAKEREM_PLUGIN_VERSION', '1.4.0');
        $this->define('MAKEREM_PLUGIN_DIR', plugin_dir_url(__FILE__));

        $this->define('MAKEREM_AJAX_PREPEND', 'makesantafe_');

        $this->includes();
        add_action('wp_loaded', array($this, 'schedule_daily_reminder')); //on load of wordpress, schedule the daily reminder
        add_action('send_reminder_emails', array($this, 'send_reminder_emails')); //on action send_reminder_emails, run the function send_reminder_emails


    }

    // Schedule the daily event if it is not already scheduled
    public function schedule_daily_reminder() {  
        
        if (!wp_next_scheduled('send_reminder_emails')) {
            wp_schedule_event(time(), 'daily', 'send_reminder_emails');
        }
    }


    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    private function define($name, $value) {
        if (!defined($name)) {
            define($name, $value);
        }
    }
    private function includes() {
        include_once MAKEREM_ABSPATH . 'inc/acf.php';
        include_once MAKEREM_ABSPATH . 'inc/post_types.php';
        include_once MAKEREM_ABSPATH . 'inc/metabox.php';
        include_once MAKEREM_ABSPATH . 'inc/email_log.php';
    }


    public function send_reminder_emails() {
        //get all reminder emails
        $emails_to_send['three_before'] = get_posts(array(
            'numberposts' 	=> -1,					
            'post_type' 	=> 'reminder_emails',	
            'meta_key'		=> 'timing',  	
            'meta_value'	=> 'three_before',
            'post_status'	=> 'publish'
        ));
        $emails_to_send['day_of'] = get_posts(array(
            'numberposts' 	=> -1,					
            'post_type' 	=> 'reminder_emails',	
            'meta_key'		=> 'timing',  	
            'meta_value'	=> 'day_of',
            'post_status'	=> 'publish'
        ));
        $emails_to_send['day_after'] = get_posts(array(
            'numberposts' 	=> -1,					
            'post_type' 	=> 'reminder_emails',	
            'meta_key'		=> 'timing',  	
            'meta_value'	=> 'day_after',
            'post_status'	=> 'publish'
        ));
        
        foreach($emails_to_send as $timing => $emails) :
            if(count($emails) > 0) :
                if($timing == 'three_before') {
                    $date = date('Y-m-d', strtotime('+2 days'));
                } elseif($timing == 'day_of') {
                    $date = date('Y-m-d');
                } elseif($timing == 'day_after') {
                    $date = date('Y-m-d', strtotime('-1 days'));
                }
                //loop through events and send emails
                foreach($emails as $email) :
                    $connected_events = get_field('connected_events', $email->ID);
                    $events = $this->get_events($date, $connected_events);
                    $recipient = get_field('recipient', $email->ID);
                    if(count($events) > 0) :
                        foreach( $events as $event) :
                            $to_send_to_users = array();
                            if($recipient == 'instructors') :
                                $to_send_to_users = $this->get_event_instructors($event->ID);
                            elseif($recipient == 'attendees') :
                                $to_send_to_users = $this->get_event_attendees($event->ID);
                            elseif($recipient == 'both') :
                                $instructors = ($this->get_event_instructors($event->ID) ? $this->get_event_instructors($event->ID) : array());
                                $attendees = ($this->get_event_attendees($event->ID) ? $this->get_event_attendees($event->ID) : array());
                                $to_send_to_users = array_merge($instructors, $attendees);
                            
                            endif; 
                            if(count($to_send_to_users) > 0) :
                                foreach($to_send_to_users as $user) :
                                    $this->send_email($user, $email, $event);
                                endforeach; //end foreach users
                            endif; //end if to_send_to_users
                        endforeach; //end foreach events
                    endif; //end if count emails



                endforeach; //end foreach events
            endif; //end if count emails


        endforeach;
    }



    private function get_events($date, $connected_events) {
        $args = array(
            'post_type' => 'sub_event',
            'posts_per_page' => -1,
            'post_parent__in' => $connected_events,
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'event_date',
                    'value' => $date,
                    'compare' => '==',
                    'type' => 'DATE'
                ),
            )
        );
        $events = new WP_Query($args);
        return $events->get_posts();
    }



    private function get_event_instructors($occurance_id) {
        $post_parent = wp_get_post_parent_id($occurance_id);
        $instructors = (get_field('instructors', $post_parent) ? get_field('instructors', $post_parent) : array());
        return $instructors;
    }
    private function get_event_attendees($occurance_id) {
        $post_parent = wp_get_post_parent_id($occurance_id);
        $attendees = get_post_meta($post_parent,'attendees',true);
        $attendees = $attendees[$occurance_id];
        $to_send = array();
        foreach($attendees as $attendee) {
            $to_send[$attendee['user_id']] = get_user($attendee['user_id']);
        }
        return $to_send;
    }

    private function open_email_container_html($email) {

        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
        $html .= '<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">';
        $html .= '<head>';
            $html .= '<meta charset="UTF-8">';
            $html .= '<meta content="width=device-width, initial-scale=1" name="viewport">';
            $html .= '<meta name="x-apple-disable-message-reformatting">';
            $html .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
            $html .= '<meta content="telephone=no" name="format-detection">';
            $html .= '<title>' . get_field('subject', $email->ID) . '</title>'; 
            $html .= $this->email_container_styles();
         $html .= '</head>';
         $html .= '<body style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">';
            //add a header that showcases the Make Santa Fe Brand including the logo and contact information
            $html .= '<div style="background-color:#FAFAFA;padding:0">';
                $html .= '<div style="max-width:800px;margin:0 auto">';
                    $html .= '<table style="width:100%;border-collapse:collapse;border-spacing:0">';
                        $html .= '<tr>';
                            $html .= '<td style="padding:0;Margin:0">';
                                $html .= '<table style="width:100%;border-collapse:collapse;border-spacing:0">';
                                    $html .= '<tr style="background:#be202e;">';
                                        $html .= '<td style="padding:20px 20px;Margin:0;min-width:40px">';
                                            $html .= '<a href="' . get_home_url() . '">';
                                                $html .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 508 329.3"><defs><style>.cls-1{fill:#FFF;stroke-width:0px;}</style></defs><path class="cls-1" d="M126,0H0v98.6h49.4v-49.2h76.6V0Z"/><path class="cls-1" d="M382,329.3h126v-98.6h-49.4v49.2h-76.6v49.4Z"/><path class="cls-1" d="M105.4,79.1c1.5,2.7,3.2,6.1,5.1,10.1s4,8.3,6.1,13,4.2,9.4,6.3,14.3c2.1,4.9,4,9.4,5.8,13.7,1.8-4.3,3.8-8.9,5.8-13.7,2.1-4.9,4.1-9.6,6.3-14.3,2.1-4.7,4.1-9,6.1-13,1.9-4,3.7-7.4,5.1-10.1h17.5c.8,5.7,1.6,12,2.3,19.1.7,7,1.3,14.4,1.9,22,.5,7.6,1,15.3,1.5,22.9.5,7.7.8,14.9,1.2,21.6h-18.8c-.2-8.3-.6-17.4-1-27.2s-1-19.7-1.9-29.7c-1.5,3.5-3.1,7.3-5,11.5-1.8,4.2-3.6,8.4-5.4,12.6-1.8,4.2-3.5,8.2-5.1,12s-3.1,7.1-4.2,9.8h-13.5c-1.2-2.7-2.6-6-4.2-9.8s-3.4-7.8-5.1-12c-1.8-4.2-3.6-8.4-5.4-12.6s-3.5-8-5-11.5c-.8,10-1.4,19.9-1.9,29.7-.4,9.8-.7,18.9-1,27.2h-18.7c.3-6.8.7-14,1.2-21.6.5-7.7.9-15.3,1.5-22.9.5-7.6,1.2-15,1.9-22,.7-7,1.5-13.4,2.3-19.1,0,0,18.3,0,18.3,0Z"/><path class="cls-1" d="M251,164.8c-1-3-2-6-3.1-9.2-1.1-3.1-2.2-6.3-3.3-9.4h-33.4c-1.1,3.1-2.2,6.3-3.3,9.4-1.1,3.1-2.1,6.2-3,9.1h-20c3.2-9.2,6.3-17.8,9.2-25.6s5.7-15.2,8.5-22.1,5.5-13.5,8.2-19.7c2.7-6.2,5.5-12.3,8.4-18.2h18.3c2.8,5.9,5.6,12,8.3,18.2s5.5,12.8,8.3,19.7c2.8,6.9,5.6,14.3,8.5,22.1s6,16.4,9.2,25.6h-20.8v.1ZM227.8,98.5c-.4,1.2-1.1,2.9-1.9,5.1-.8,2.1-1.8,4.6-2.8,7.4-1.1,2.8-2.2,5.9-3.5,9.3s-2.6,6.9-4,10.6h24.4c-1.3-3.7-2.6-7.3-3.8-10.6-1.2-3.4-2.4-6.5-3.5-9.3s-2.1-5.3-2.9-7.4c-.8-2.2-1.5-3.9-2-5.1Z"/><path class="cls-1" d="M333.1,164.8c-1.7-2.8-3.8-5.8-6.1-9-2.4-3.2-4.9-6.5-7.6-9.8s-5.6-6.4-8.5-9.5c-3-3-5.9-5.7-8.9-8v36.3h-19.3v-85.7h19.3v32.2c5-5.2,10-10.6,15.1-16.3,5.1-5.7,9.8-11,14.2-15.8h22.7c-5.8,6.9-11.7,13.6-17.6,20s-12.1,12.9-18.6,19.3c6.8,5.7,13.5,12.5,19.8,20.3,6.4,7.8,12.5,16.5,18.4,25.9h-22.9v.1Z"/><path class="cls-1" d="M367.1,164.8v-85.7h57.9v16.2h-38.6v16.8h34.2v15.8h-34.2v20.6h41.4v16.2h-60.7v.1Z"/><path class="cls-1" d="M130,246.1c2.9,0,5.1-.4,6.5-1.2s2.1-2,2.1-3.7-.7-3.1-2.1-4.2c-1.4-1-3.7-2.2-6.8-3.5-1.5-.6-3-1.2-4.4-1.9-1.4-.6-2.6-1.4-3.7-2.3-1-.9-1.8-1.9-2.5-3.2-.6-1.2-.9-2.7-.9-4.5,0-3.5,1.3-6.3,3.9-8.4,2.6-2.1,6.2-3.1,10.7-3.1,1.1,0,2.3.1,3.4.2,1.1.1,2.2.3,3.2.5s1.8.4,2.6.6c.7.2,1.3.4,1.7.5l-1.3,6.2c-.8-.4-2-.8-3.6-1.3-1.6-.4-3.6-.7-5.9-.7-2,0-3.7.4-5.2,1.2s-2.2,2-2.2,3.7c0,.9.2,1.6.5,2.3s.8,1.3,1.5,1.8,1.5,1,2.6,1.5c1,.5,2.3.9,3.7,1.5,1.9.7,3.6,1.4,5.1,2.1,1.5.7,2.8,1.5,3.8,2.4,1.1.9,1.9,2,2.4,3.3.6,1.3.8,2.9.8,4.8,0,3.7-1.4,6.5-4.1,8.4-2.7,1.9-6.7,2.8-11.7,2.8-3.5,0-6.3-.3-8.3-.9-2-.6-3.4-1-4.1-1.3l1.3-6.2c.8.3,2.1.8,3.9,1.4,1.7.9,4.1,1.2,7.1,1.2Z"/><path class="cls-1" d="M167.9,210.3c2.9,0,5.3.4,7.3,1.1,2,.7,3.6,1.8,4.8,3.2s2.1,3,2.6,4.8c.5,1.9.8,3.9.8,6.2v25c-.6.1-1.5.2-2.6.4s-2.3.3-3.7.5-2.9.3-4.5.4c-1.6.1-3.2.2-4.8.2-2.3,0-4.3-.2-6.2-.7s-3.5-1.2-4.9-2.2-2.5-2.3-3.2-4c-.8-1.6-1.2-3.6-1.2-5.9s.4-4.1,1.3-5.7c.9-1.6,2.1-2.9,3.7-3.8,1.5-1,3.3-1.7,5.4-2.2,2-.5,4.2-.7,6.5-.7.7,0,1.5,0,2.2.1.8.1,1.5.2,2.2.3s1.3.2,1.8.3.9.2,1.1.2v-2c0-1.2-.1-2.3-.4-3.5-.3-1.2-.7-2.2-1.4-3.1-.7-.9-1.6-1.6-2.7-2.2-1.2-.5-2.7-.8-4.5-.8-2.4,0-4.4.2-6.2.5s-3.1.7-4,1l-.8-5.9c.9-.4,2.5-.8,4.6-1.2s4.3-.3,6.8-.3ZM168.5,246.1c1.7,0,3.2,0,4.5-.1s2.4-.2,3.3-.4v-11.9c-.5-.3-1.3-.5-2.5-.7s-2.6-.3-4.2-.3c-1.1,0-2.2.1-3.4.2-1.2.2-2.3.5-3.3,1s-1.8,1.2-2.5,2-1,2-1,3.3c0,2.6.8,4.3,2.5,5.3,1.6,1.1,3.8,1.6,6.6,1.6Z"/><path class="cls-1" d="M195.1,212.4c1.6-.4,3.8-.8,6.5-1.3s5.8-.7,9.4-.7c3.2,0,5.8.4,7.9,1.3,2.1.9,3.8,2.2,5,3.8,1.3,1.6,2.1,3.6,2.7,5.8.5,2.3.8,4.7.8,7.5v22.5h-7.2v-20.9c0-2.5-.2-4.6-.5-6.3s-.9-3.2-1.7-4.2c-.8-1.1-1.8-1.9-3.1-2.3-1.3-.5-2.9-.7-4.8-.7-.8,0-1.6,0-2.4.1-.8.1-1.6.1-2.3.2-.7.1-1.4.2-2,.3s-1,.2-1.3.2v33.8h-7.2v-39.1h.2Z"/><path class="cls-1" d="M245.9,211.3h15.1v6h-15.1v18.5c0,2,.2,3.7.5,5s.8,2.3,1.4,3.1c.6.7,1.4,1.3,2.3,1.6.9.3,2,.5,3.2.5,2.2,0,3.9-.2,5.2-.7,1.3-.5,2.2-.8,2.7-1l1.4,5.9c-.7.4-2,.8-3.8,1.3s-3.8.8-6.2.8c-2.7,0-5-.3-6.7-1-1.8-.7-3.2-1.7-4.3-3.1s-1.8-3.1-2.3-5.1c-.4-2-.7-4.4-.7-7v-35.7l7.2-1.2v12.1h.1Z"/><path class="cls-1" d="M283.1,210.3c2.9,0,5.3.4,7.3,1.1,2,.7,3.6,1.8,4.8,3.2,1.2,1.4,2.1,3,2.6,4.8.5,1.9.8,3.9.8,6.2v25c-.6.1-1.5.2-2.6.4s-2.3.3-3.7.5-2.9.3-4.5.4c-1.6.1-3.2.2-4.8.2-2.3,0-4.3-.2-6.2-.7-1.9-.5-3.5-1.2-4.9-2.2s-2.5-2.3-3.2-4c-.8-1.6-1.2-3.6-1.2-5.9s.4-4.1,1.3-5.7c.9-1.6,2.1-2.9,3.7-3.8,1.5-1,3.3-1.7,5.4-2.2,2-.5,4.2-.7,6.5-.7.7,0,1.5,0,2.2.1.8.1,1.5.2,2.2.3s1.3.2,1.8.3.9.2,1.1.2v-2c0-1.2-.1-2.3-.4-3.5s-.7-2.2-1.4-3.1c-.7-.9-1.6-1.6-2.7-2.2-1.2-.5-2.7-.8-4.5-.8-2.4,0-4.4.2-6.2.5-1.8.3-3.1.7-4,1l-.8-5.9c.9-.4,2.5-.8,4.6-1.2,1.9-.1,4.3-.3,6.8-.3ZM283.7,246.1c1.7,0,3.2,0,4.5-.1s2.4-.2,3.3-.4v-11.9c-.5-.3-1.3-.5-2.5-.7s-2.5-.3-4.2-.3c-1.1,0-2.2.1-3.4.2-1.2.2-2.3.5-3.3,1s-1.8,1.2-2.5,2-1,2-1,3.3c0,2.6.8,4.3,2.5,5.3,1.5,1.1,3.8,1.6,6.6,1.6Z"/><path class="cls-1" d="M343.6,191.6c2.1,0,3.9.2,5.4.5s2.6.6,3.2.8l-1.2,6.1c-.6-.3-1.5-.6-2.6-.9-1.1-.3-2.5-.4-4.2-.4-3.3,0-5.7.9-7,2.7s-2,4.3-2,7.3v3.5h15.4v6h-15.4v34h-7.2v-43.6c0-5.1,1.3-9.1,3.8-11.9,2.5-2.7,6.5-4.1,11.8-4.1Z"/><path class="cls-1" d="M355.5,231.3c0-3.5.5-6.6,1.5-9.3,1-2.6,2.4-4.8,4.1-6.6,1.7-1.7,3.6-3,5.8-3.9,2.2-.9,4.5-1.3,6.8-1.3,5.4,0,9.5,1.7,12.4,5,2.9,3.4,4.3,8.5,4.3,15.3v1.2c0,.5,0,.9-.1,1.3h-27.4c.3,4.2,1.5,7.3,3.6,9.5s5.4,3.2,9.8,3.2c2.5,0,4.6-.2,6.3-.7,1.7-.4,3-.9,3.9-1.3l1,6c-.9.5-2.4.9-4.6,1.5-2.2.5-4.7.8-7.4.8-3.5,0-6.5-.5-9-1.6s-4.6-2.5-6.3-4.3-2.9-4-3.7-6.6c-.6-2.4-1-5.1-1-8.2ZM382.9,227.4c0-3.2-.8-5.9-2.4-8-1.7-2.1-4-3.1-6.9-3.1-1.6,0-3.1.3-4.3,1-1.3.6-2.3,1.5-3.2,2.5-.9,1-1.6,2.2-2,3.5-.5,1.3-.8,2.7-1,4.1h19.8Z"/></svg>';
                                            $html .= '</a>';
                                        $html .= '</td>';
                                        $html .= '<td style="padding:0;Margin:0;padding-right:20px;text-align:right">';
                                            $html .= '<a href="https://makesantafe.org" target="_blank" style="font-size:18px;text-decoration:none;display:block;margin:0;color:#fff">Make Santa Fe</a>';
                                            $html .= '<a href="mailto:build@makesantafe.org" target="_blank" style="font-size:18px;text-decoration:none;display:block;margin:0;color:#fff">build@makesantafe.org</a>';
                                        $html .= '</td>';
                                    $html .= '</tr>';
                                $html .= '</table>';
                            $html .= '</td>';
                        $html .= '</tr>';
                    $html .= '</table>';
                $html .= '</div>';
                $html .= '<div dir="ltr" class="es-wrapper-color" lang="en" style="background-color:#FAFAFA;max-width:800px;margin:0 auto">';
        return $html;
    }
    private function close_email_container_html() {


        //a simple footer with email footer information
        $html = '<div style="max-width:800px;margin:0 auto">';
            $html .= '<table style="width:100%;border-collapse:collapse;border-spacing:0">';
                $html .= '<tr>';
                    $html .= '<td style="padding:20px 20px;Margin:0;text-align:center">';
                        $html .= '<a href="https://makesantafe.org" target="_blank" style="font-size:14px;text-decoration:none;color:#be202e">makesantafe.org</a>';
                    $html .= '</td>';
                $html .= '</tr>';
            $html .= '</table>';
        $html .= '</div>';

        $html .= '</div></div></body></html>';
        return $html;
    }
    private function email_container_styles() {
        $return = '<style type="text/css">
        body {
            margin:0;
            padding:0;
            -webkit-text-size-adjust:100%;
            -ms-text-size-adjust:100%;
            width:100%!important;
            font-family:"Montserrat", arial, "helvetica neue", helvetica, sans-serif;
        }
        #outlook a {
            padding:0;
        }
        .ch {
            mso-style-priority:100!important;
            text-decoration:none!important;
        }
        a[x-apple-data-detectors] {
            color:inherit!important;
            text-decoration:none!important;
            font-size:inherit!important;
            font-family:inherit!important;
            font-weight:inherit!important;
            line-height:inherit!important;
        }
        a {
            color:#be202e;
            text-decoration:none;
            font-weight:bold;
        }
        .a {
            display:none;
            float:left;
            overflow:hidden;
            width:0;
            max-height:0;
            line-height:0;
            mso-hide:all;
        }
        @media only screen and (max-width:600px) {p, ul li, ol li, a { line-height:150%!important } h1, h2, h3, h1 a, h2 a, h3 a { line-height:120%!important } h1 { font-size:36px!important; text-align:left } h2 { font-size:26px!important; text-align:left } h3 { font-size:20px!important; text-align:left }  .cp h2 a, .co h2 a, .cn h2 a { font-size:26px!important; text-align:left }  .bq td a { font-size:12px!important }  .co p, .co ul li, .co ol li, .co a { font-size:14px!important } .cn p, .cn ul li, .cn ol li, .cn a { font-size:14px!important } .cm p, .cm ul li, .cm ol li, .cm a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .ck, .ck h1, .ck h2, .ck h3 { text-align:center!important }    .ci { display:inline-block!important } a.ch, button.ch { font-size:20px!important; display:inline-block!important } .ce table, .cf, .cg { width:100%!important } .cb table, .cc table, .cd table, .cb, .cd, .cc { width:100%!important; max-width:600px!important }  .adapt-img { width:100%!important; height:auto!important }  .by { padding-right:0!important }          .bq td { width:1%!important } table.bp, .esd-block-html table { width:auto!important } table.bo { display:inline-block!important } table.bo td { display:inline-block!important }                                         }
        @media screen and (max-width:384px) {.mail-message-content { width:414px!important } }
        </style>';
        return $return;
    }



    private function send_email($user, $email, $event) {
        $to = $user->user_email;
        $from = get_field('from_email',$email->ID);
        $reply_to = get_field('reply_to_email',$email->ID);
        $subject = $this->replace_merge_tags(get_field('subject',$email->ID), $user, $event);
        $message = $this->replace_merge_tags(apply_filters('the_content', $email->post_content), $user, $event);
        
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: Make Santa Fe <' . $from . '>';
        $headers[] = ($reply_to ? 'Reply-To: ' . $reply_to : 'Reply-To: ' . $from);
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-Type: text/html; charset=ISO-8859-1';
        $headers[] = 'X-Sender: ' . get_bloginfo('name') . ' <' . get_bloginfo('admin_email') . '>';
        $headers[] = 'X-Priority: 1';
        $headers[] = 'Importance: High';
        $headers[] = 'X-Mailer: PHP/' . phpversion();
        $headers[] = 'X-Originating-IP: ' . $_SERVER['SERVER_ADDR'];

        $message = $this->open_email_container_html($email) . $message . $this->close_email_container_html();
        $sent = wp_mail($to, $subject, $message, $headers);
        if($sent) :
            $this->log_email($to, $subject,  $message, $email);
        endif;

    }

    private function log_email($to, $subject, $message, $email) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'mind_email_log';
        $wpdb->insert(
            $table_name,
            array(
                'sent_to' => $to,
                'email_subject' => $subject,
                'email_id' => $email->ID,
                'date_sent' => current_time('mysql'),
                'email_content' => $message
            )
        );
    }

    private function replace_merge_tags($content, $user, $event) {
        $event_start = new DateTimeImmutable(get_post_meta($event->ID, 'event_start_time_stamp', true));
        $event_end = new DateTimeImmutable(get_post_meta($event->ID, 'event_end_time_stamp', true));
        $content = str_replace('{event_title}', get_the_title(get_post_parent($event->ID)), $content);
        $content = str_replace('{first_name}', $user->first_name, $content);
        $content = str_replace('{last_name}', $user->last_name, $content);
        $content = str_replace('{email}', $user->user_email, $content);
        $content = str_replace('{start_date}', $event_start->format(get_option( 'date_format' )), $content);
        $content = str_replace('{end_date}', $event_end->format(get_option( 'date_format' )), $content);
        $content = str_replace('{start_time}', $event_start->format(get_option( 'time_format' )), $content);
        $content = str_replace('{end_time}', $event_end->format(get_option( 'time_format' )), $content);
        $content = str_replace('{excerpt}', get_the_excerpt(get_post_parent($event->ID)), $content);
        $content = str_replace('{event_link}', get_the_permalink($event->ID), $content);
        return html_entity_decode($content);
    }

    // Deactivate the scheduled event upon plugin deactivation
    public static function deactivate() {
        $timestamp = wp_next_scheduled('send_instructor_reminder_email');
        wp_unschedule_event($timestamp, 'send_instructor_reminder_email');

    }
    public static function activate(){
        //create eail log table in database
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'mind_email_log';
        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            sent_to varchar(255) NOT NULL,
            email_subject varchar(255) NOT NULL,
            email_id mediumint(9) NOT NULL,
            date_sent datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            email_content text NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }


}//end of class


add_action('init', function(){
    
    new makeReminder();


});



register_activation_hook(__FILE__, array('makeReminder', 'activate'));
register_deactivation_hook(__FILE__, array('makeReminder', 'deactivate'));

