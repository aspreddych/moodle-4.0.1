<?php

use core_completion\progress;
require_once(__DIR__.'/../../config.php');
require_once($CFG->libdir.'/externallib.php');
require_once($CFG->dirroot.'/user/lib.php');
require_once($CFG->dirroot.'/course/lib.php');

class local_custom_service_external extends external_api {
    public static function get_count_parameters() {
        return new external_function_parameters(
            array(
                //'countid' => new external_value(PARAM_TEXT, 'User Id')                
            )
        );
    }
    public static function get_count() {
        global $DB,$CFG;

        $Coursecount = $DB->get_record_sql("SELECT COUNT(*) as count FROM {course} WHERE id>1 AND visible=1");
        $Usercount = $DB->get_record_sql("SELECT COUNT(*) as count FROM {user} where id>2 AND deleted=0 AND suspended=0");
        
        $data = [
                        'CourseCount'=>$Coursecount->count,
                        'UserCount'=>$Usercount->count
                        ];
        return $data;
    }
    public static function get_count_returns() {
        return new external_single_structure(
                array(
                    'CourseCount' => new external_value(PARAM_TEXT, 'Course Count'),
                    'UserCount' => new external_value(PARAM_TEXT, 'User Count')
                )
            );
    }
}