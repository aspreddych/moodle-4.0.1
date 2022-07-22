<?php

defined('MOODLE_INTERNAL') || die();
$functions = array(
    'local_custom_service_get_user' => array(
        'classname' => 'local_custom_service_external',
        'methodname' => 'get_user',
        'classpath' => 'local/custom_service/externallib.php',
        'description' => 'Update courses LTI to show in Gradebook',
        'type' => 'write',
        'ajax' => true,
    )
);

$services = array(
    'Custom Web Services' => array(
        'functions' => array(
            'local_custom_service_get_user'
        ),
        'restrictedusers' => 0,
        'enabled' => 1,
        'shortname'=>'Custom_web_service'
    )
);