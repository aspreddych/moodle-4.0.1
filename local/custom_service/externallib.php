<?php

use core_completion\progress;
require_once(__DIR__.'/../../config.php');
require_once($CFG->libdir.'/externallib.php');
require_once($CFG->dirroot.'/user/lib.php');
require_once($CFG->dirroot.'/course/lib.php');

class local_custom_service_external extends external_api {

    public static function get_user_parameters() {
        return new external_function_parameters(
            array(
                'userid' => new external_value(PARAM_TEXT, 'User Id')                
            )
        );
    }
    public static function get_user($userid) {
        global $DB,$CFG;

        $user = $DB->get_record('user', ['id' => $userid]);
        
        $lti_updated = [
                        'firstname'=>$user->firstname,
                        'lastname'=>$user->lastname
                        ];
        return $lti_updated;
    }
    public static function get_user_returns() {
        return new external_single_structure(
                array(
                    'firstname' => new external_value(PARAM_TEXT, 'First Name'),
                    'lastname'=> new external_value(PARAM_TEXT, 'Last Name')
                )
            );
    }
}