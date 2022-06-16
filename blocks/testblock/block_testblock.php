<?php
class block_testblock extends block_base {

    function init(){
        $this->title = get_string('testblock','block_testblock');
    }

    public function get_content() {
        if ($this->content !== NULL) {
            return $this->content;
        }
        $this->content = new stdClass;
        $this->content->text = 'This is text'; 
        $this->content->footer = 'This is footer';
        return $this->content;
    }
}
