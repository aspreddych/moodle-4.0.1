<?php
/**
 * @package     local_message
 * @author      Ajay
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot.'/local/message/classes/forms/edit.php');

global $DB;

$PAGE->set_url(new moodle_url('/local/message/edit.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Edit');

// We want to display our form.
$msform = new edit();

if ($msform->is_cancelled()) {
    // Go back to manage.php page
    redirect($CFG->wwwroot . '/local/message/manage.php', get_string('cancelled_form', 'local_message'));
} else if ($fromform = $msform->get_data()) {
   // insert data into databse table

   $recordtoinsert = new stdClass();
   $recordtoinsert->messagetext = $fromform->messagetext;
   $recordtoinsert->messagetype = $fromform->messagetype;

   $DB->insert_record('local_message',$recordtoinsert);
   redirect($CFG->wwwroot . '/local/message/manage.php', get_string('data_saved', 'local_message'));
}

echo $OUTPUT->header();
$msform->display();
echo $OUTPUT->footer();