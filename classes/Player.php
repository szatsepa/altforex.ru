<?php

/*
 * created by arcady.1254@gmail.com 11/4/2012
 */

/**
 * Description of Player
 *
 * @author seroga
 */
class Player {
    
    var $id;
    var $name;
    var $surname;
    var $email;
    var $level;
    var $votes;
    var $element;
    
    function Player($data){
        
        $this->id = $data[id];
        $this->name = $data[name];
        $this->surname = $data[surname];
        $this->email = $data[email];
        $this->level = $data[level];
        $this->votes = $data[cash];
        $this->element = $data[element];
    }
}

?>
