<?php
/**
 * @package     local_message
 * @author      Ajay
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function local_message_before_footer() {
    global $DB;

    $messages = $DB->get_records('local_message');
     foreach($messages as $message){
        $type = \core\output\notification::NOTIFY_INFO;
        if ($message->messagetype === '0') {
            $type = \core\output\notification::NOTIFY_WARNING;
        }
        if ($message->messagetype === '1') {
            $type = \core\output\notification::NOTIFY_SUCCESS;
        }
        if ($message->messagetype === '2') {
            $type = \core\output\notification::NOTIFY_ERROR;
        }
        \core\notification::add($message->messagetext, $type);
     }
 }