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
    var $level;
    var $id_end;
    
    function Games(){
        $this->data = array();
    }
    
    function setGames($level){
        
        $this->level = $level;
        
        $query = "SELECT e.id, 
        e.date_change AS 'update', 
        e.square, 
        e.circle, 
        e.triangle, 
        e.level, 
        l.name AS level_name,
        l.id
        FROM election AS e, 
        elements AS l 
        WHERE e.stop_round <> 1 
        AND e.level = l.id 
        AND l.id <= $this->level
                ORDER BY l.id";
        
        $result = mysql_query($query) or die($query);
        
        while ($var = mysql_fetch_assoc($result)){
            array_push($this->data, $var);
            $this->id_end = $var[id];
        }
        
        $this->count = count($this->data);
        
        if($this->level > $this->count)$this->_start();   
    }
    function _start(){
        $tmp_arr = array();
        for($i=1;$i<(($this->level)+1);$i++){
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
        unset ($_SESSION[level]); 
        
        while ($this->data){
            
            array_pop($this->data);
            
        }
        
        if(!$this->data)$this->_reread ();
    }
    function _reread(){
         
        $query = "SELECT e.id, 
        e.date_change AS 'udpate', 
        e.square, 
        e.circle, 
        e.triangle, 
        e.level, 
        l.name AS level_name 
        FROM election AS e, 
        elements AS l 
        WHERE e.stop_round <> 1 
        AND e.level = l.id 
        AND l.id <= $this->level";
        
        $result = mysql_query($query) or die($query);
        
        while ($var = mysql_fetch_assoc($result)){
            array_push($this->data, $var);
        }
        $this->count = count($this->data);
    }
}

?>
