<?php
class Temoignage {
    private $message;

    function __construct($message)
    {
        $this->message = $message;
    } 
    
    public function set_message($message) {
        $this->message = $message;
    }

    public function get_message() {
        return $this->message;
    }
 } 
?>