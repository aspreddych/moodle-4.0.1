<?php
class block_testblock extends block_base {

    function init(){
        $this->title = get_string('testblock','block_testblock');
    }
    
    function has_config() {
        return true;
    }
    public function get_content() {
        global $DB;

        if ($this->content !== NULL) {
            return $this->content;
        }

        
        $showcourses = get_config('block_testblock','showcourses');
        $content = '';
        if($showcourses){
            $courses = $DB->get_records('course');
            foreach($courses as $course){
                $content.= $course->fullname."<br/>";
            }
        }else{
            $users = $DB->get_records('user');
            foreach($users as $user){
                $content .=$user->firstname." ".$user->lastname."<br/>";
            }
        }
       

        

        $this->content = new stdClass;
        $this->content->text = $content;
        $this->content->footer = 'This is footer';
        return $this->content;
    }
}
