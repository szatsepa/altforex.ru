<?php

/*
 * created by arcady.1254@gmail.com 10/4/2012
 */

/**
 * Description of Elements
 *
 * @author seroga
 */
class Elements {
    
    var $data;
    
    function Elements(){
        
        $this->data = array();
        
        $query = "SELECT * FROM elements ORDER BY id";
        
        $result = mysql_query($query) or die($query);
        
        while($row = mysql_fetch_assoc($result)){
            
            $element = new Element($row);
            
            array_push($this->data, $element);
        }
    }
}

?>
