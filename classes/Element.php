<?php

/*
 * created by arcady.1254@gmail.com 10/4/2012
 */

/**
 * Description of Element
 *
 * @author seroga
 */
class Element {
    
    var $id;
    var $simbol;
    var $name;
    var $weight;
    var $scale;
    
    function Element($data){
        
        $this->id = $data[id];
        $this->simbol = $data[simbol];
        $this->name = $data[name];
        $this->weight = $data[weight];
        $this->scale = $data[scale];
    }
}

?>
