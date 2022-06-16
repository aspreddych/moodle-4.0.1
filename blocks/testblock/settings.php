<?php
if($ADMIN->fulltree){
    $settings->add(new admin_setting_configcheckbox('block_testblock/showcourses', 'Show Courses', 'Show Courses instead of users',0));
}