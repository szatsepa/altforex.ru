<?php

/*
 * created by arcady.1254@gmail.com 7/3/2012
 */

class User{
    
    var $data;
    var $id;
    var $tasks;
    var $factor;
    var $element;
    var $result;
    
    function User(){
        $this->data = array();
        $this->tasks = new Tasks();
    }
    
    function setUser($id){  
        
        $query = "SELECT u.id,
                         u.surname, 
                         u.name, 
                         u.email, 
                         u.phone, 
                         u.key_code, 
                         a.cash, 
                         a.level,  
                         (SELECT Count(u.id) FROM users AS u, user_task AS t WHERE u.id = t.user_id AND u.id = $id) AS task,
                         (SELECT Count(u.id) FROM users AS u, user_task AS t WHERE u.id = t.user_id AND u.id = $id AND t.auto = 1) AS auto, 
                         a.auto_on,
                         (SELECT e.weight FROM elements AS e, my_account AS a, users AS u WHERE u.id = a.user_id AND a.level = e.id AND u.id = $id) AS factor,
                         (SELECT SUM(added) FROM trunk WHERE user_id = $id) AS result
                 FROM users AS u   
                 LEFT JOIN my_account AS a 
                 ON u.id = a.user_id 
                 WHERE u.id = $id AND u.activ = 1";
        
        $result = mysql_query($query) or die ($query);
        
        $row = mysql_fetch_assoc($result);
        
        $this->id = $row[id];
                
        $this->data = $row; 
        
        $this->factor = $row[factor];
        
        $this->result = $row[result];
        
        if($this->data[task] > 0){
            $this->tasks->setTasks($this->id);
        }
        
        unset($row); 
        
        mysql_free_result($result);
    }
    function setUserKey($array){
        
        $this->data = $array;
        
    }
    function _createCode($num_cnt, $str_cnt){
    
        $cod = '';

        $simbol_array = array('A','S','D','F','G','H','J','K','L','Q','W','E','R','T','Y','U','I','O','P','Z','X','C','V','B','N','M');

        for($i = 0;$i<$str_cnt;$i++){
            
            $cod .= $simbol_array[rand(0, count($simbol_array))];
            
        }

        for($i = 0;$i<$num_cnt;$i++){
            $cod .= rand(0, 9);
        }

        return $cod;
    }
    function setAuto(){
        
        $query = "SELECT auto_on FROM my_account WHERE user_id = $this->id";
        
        $result = mysql_query($query) or die($query);
        
        $row = mysql_fetch_row($result);
        
        $on_off = $row[0];
        
        if($on_off == 0){
                $on_off = 1;
            }  else {
                $on_off = 0;
            }
         $query = "UPDATE my_account SET auto_on = $on_off WHERE user_id = $this->id";
         
         $result = mysql_query($query) or die($query);
         
         return 1;
    }
    function getTask($id){
        
        return ($this->tasks->data[$id]);
    }
    function reactivTasks(){
        
        $query = "UPDATE `user_task` SET `auto` = '1' WHERE user_id = $this->id";
        
        $result = mysql_query($query) or die ($query);
        
        if(!$result){
            return NULL;
        }  else {
            return 1;
        }
        
    }
    function _checkLevel($data){
        $level = 1;
        $scale = 0;
        foreach ($data as $value) {
            
            if($this->data[cash] >= $value->scale){
                $level = $value->id;
                $this->element = $value;
                $scale = $value->scale;
                }
        }
        
        
        if($this->data[level] != $level){
            
            $query = "UPDATE my_account SET level = $level WHERE user_id = $this->id";
        
            mysql_query($query) or die($query);
            
            $this->data[level] = $level;
        }
    }
}
?>
