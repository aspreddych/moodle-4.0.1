<?php
class block_testblock extends block_base {

    function init(){
        $this->title = get_string('testblock','block_testblock');
    }

    public function get_content() {
        global $DB;

        if ($this->content !== NULL) {
            return $this->content;
        }

        $users = $DB->get_records('user');
        $userstring = '';
        foreach($users as $user){
            $userstring .=$user->firstname." ".$user->lastname."<br/>";
        }

        $this->content = new stdClass;
        $this->content->text = $userstring; 
        $this->content->footer = 'This is footer';
        return $this->content;
    }
}
