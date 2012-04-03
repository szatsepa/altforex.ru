<?php

/*
 * created by arcady.1254@gmail.com 3/4/2012 
 */

/**
 * Description of Games
 *
 * @author seroga
 */
class Games{
    
    var $data;
    var $count;
    
    function Games(){
        $this->data = array();
    }
    
    function setGames($level){
        
        $query = "SELECT e.id, 
        e.date_change AS 'update', 
        e.square, 
        e.circle, 
        e.triangle, 
        e.level, 
        l.name AS level_name 
        FROM election AS e, 
        elements AS l 
        WHERE e.stop_round <> 1 
        AND e.level = l.id 
        AND l.id <= $level";
        
        $result = mysql_query($query) or die($query);
        
        while ($var = mysql_fetch_assoc($result)){
            array_push($this->data, $var);
        }
        
        $this->count = count($this->data);
        
        if($level > $this->count)$this->_start($level);   
    }
    function _start($level){
        $tmp_arr = array();
        for($i=1;$i<=$level;$i++){
            $tmp_arr[$i] = $i;
            foreach ($this->data as $value){
                if($i == $value[level])$tmp_arr[$i] = NULL;
            }
        }
        foreach ($tmp_arr as $value) {
            if($value){
                mysql_query("INSERT INTO election (level) VALUES ($value)");
            }
        }
    }
}

?>
