<?php

defined('MOODLE_INTERNAL') || die();
$functions = array(
    'local_custom_service_get_count' => array(
        'classname' => 'local_custom_service_external',
        'methodname' => 'get_count',
        'classpath' => 'local/custom_service/externallib.php',
        'description' => 'Get Count for displaying in the Landing Page',
        'type' => 'write',
        'ajax' => true,
    )
);

$services = array(
    'Get Custom Count Web Service' => array(
        'functions' => array(
            'local_custom_service_get_count'
        ),
        'restrictedusers' => 0,
        'enabled' => 1,
        'shortname'=>'custom_count_web_service'
    )
);